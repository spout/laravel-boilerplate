@include('includes.ace-editor')

{!! Form::model($object, [
    'route' => empty($object->id) ? ['admin.menus.store'] : ['admin.menus.update', $object->id],
    'method' => empty($object->id) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('title', _i('Title')) !!}
{!! Form::text('title') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('slug', _i('Slug')) !!}
{!! Form::text('slug') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('attributes', _i('Attributes')) !!}
{{-- TODO: setting attributes textarea value as null causes an error (array) --}}
{!! Form::textarea('attributes', $object->attributes, ['rows' => 1]) !!}
{!! Form::closeGroup() !!}

<div class="btn-group btn-group-xs" id="tree-actions">
  <button class="btn btn-success" data-action="create"><i class="fa fa-plus"></i> {{ _i("Create") }}</button>
  <button class="btn btn-warning" data-action="edit"><i class="fa fa-edit"></i> {{ _i("Edit") }}</button>
  <button class="btn btn-danger" data-action="delete"><i class="fa fa-trash"></i> {{ _i("Delete") }}</button>
</div>
<div id="menu-items-tree"></div>

{!! Form::openGroup('menu_item_association', _i("Associated page")) !!}
{!! Form::select('menu_item_association', $associationList) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('menu_item_title', _i("Title")) !!}
{!! Form::text('menu_item_title') !!}
{!! Form::closeGroup() !!}

<p>
  <a class="btn btn-link btn-xs" data-toggle="collapse" href="#menu-item-advanced">{{ _i("Advanced options") }}</a>
</p>
<div class="collapse" id="menu-item-advanced">
  {!! Form::openGroup('menu_item_url', _i("URL")) !!}
  {!! Form::url('menu_item_url') !!}
  {!! Form::closeGroup() !!}

  {!! Form::openGroup('menu_item_route', _i("Route")) !!}
  {!! Form::textarea('menu_item_route', null, ['rows' => 1]) !!}
  {!! Form::closeGroup() !!}

  {!! Form::openGroup('menu_item_attributes', _i("Attributes")) !!}
  {!! Form::textarea('menu_item_attributes', null, ['rows' => 1]) !!}
  {!! Form::closeGroup() !!}
</div>

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@push('scripts')
    <script>
      $(function () {
        var menuId = '{{ $object->id }}';
        var $menuItemsTree = $('#menu-items-tree');
        $menuItemsTree.jstree({
          'core': {
            'check_callback': true,
            'multiple': false,
            'data': {
              'url': '{{ route('admin.menus.tree-data', ['id' => $object->id]) }}',
              'data': function (node) {
                return {'id': node.id};
              }
            },
            "themes": {
              "variant": "large"
            }
          },
          'contextmenu': {
            'items': function(n) {
              var tmp = $.jstree.defaults.contextmenu.items();
              tmp.create.label = "{{ _i("Create") }}";
              tmp.rename.label = "{{ _i("Rename") }}";
              tmp.remove.label = "{{ _i("Delete") }}";
              tmp.ccp.label = "{{ _i("Edit") }}";
              tmp.ccp.submenu.copy.label = "{{ _i("Copy") }}";
              tmp.ccp.submenu.cut.label = "{{ _i("Cut") }}";
              tmp.ccp.submenu.paste.label = "{{ _i("Paste") }}";
              return tmp;
            }
          },
          'sort' : function(a, b) {
            var a1 = this.get_node(a);
            var b1 = this.get_node(b);
            if (a1.sort == b1.sort){
              return (a1.sort > b1.sort) ? 1 : -1;
            } else {
              return (a1.sort > b1.sort) ? 1 : -1;
            }
          },
          "plugins": [
            "contextmenu",
            "dnd",
            "state",
            "wholerow",
            "sort"
          ]
        }).on("select_node.jstree", function (e, data) {
          console.log("select_node.jstree");

          console.log(data.node.data);

          var $menuItemAssociation = $('#menu_item_association');
          var $menuItemTitle = $('#menu_item_title');
          var $menuItemUrl = $('#menu_item_url');
          var $menuItemRoute = $('#menu_item_route');
          var $menuItemAttributes = $('#menu_item_attributes');

          var association = data.node.data.model + '.' + data.node.data.foreign_key;

          $menuItemAssociation.val(association).trigger('change');
          $menuItemTitle.val(data.node.data.title);
          $menuItemUrl.val(data.node.data.url);
          $menuItemRoute.val(data.node.data.route);
          $menuItemAttributes.val(data.node.data.attributes);

        }).on("rename_node.jstree move_node.jstree", function (e, data) {
          console.log("rename_node.jstree move_node.jstree");

          var parentId = data.node.parent == '#' ? null : data.node.parent;
          var sort = typeof data.position === 'undefined' ? null : data.position;
          var ajaxData = {id: data.node.id, menu_id: menuId, parent_id: parentId, title: data.node.text, sort: sort};

          $.post('{{ route('admin.menus.tree-save') }}', ajaxData)
            .done(function () {
              data.instance.refresh();
            });
        }).on("delete_node.jstree", function (e, data) {
          console.log("delete_node.jstree");

          var ajaxData = {id: data.node.id};
          if (confirm("{{ _i("Are you sure?") }}")) {
            $.post('{{ route('admin.menus.tree-destroy') }}', ajaxData)
              .done(function () {

              });
          }
        });

        $('#tree-actions button').on('click', function (e) {
          e.preventDefault();
          var ref = $('#menu-items-tree').jstree(true),
            sel = ref.get_selected();
          if (!sel.length) { return false; }

          switch ($(this).data('action')) {
            case 'create':
              sel = sel[0];
              sel = ref.create_node(sel);
              if (sel) {
                ref.edit(sel);
              }
              break;

            case 'edit':
              sel = sel[0];
              ref.edit(sel);
              break;

            case 'delete':
              ref.delete_node(sel);
              break;
          }

        });
      });
    </script>
@endpush