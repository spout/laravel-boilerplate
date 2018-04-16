@include('includes.ace-editor')

{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.menus.store'] : ['admin.menus.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
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

@if (!empty($object->pk))
    <div class="row">
        <div class="col-sm-6">
            <div class="btn-group btn-group-xs" id="tree-actions">
                <button class="btn btn-success" data-action="create"><i class="fa fa-plus"></i> {{ _i("Create") }}</button>
                <button class="btn btn-warning" data-action="edit"><i class="fa fa-edit"></i> {{ _i("Edit") }}</button>
                <button class="btn btn-info" data-action="deselect"><i class="fa fa-check-square-o"></i> {{ _i("Deselect") }}</button>
                <button class="btn btn-danger" data-action="delete"><i class="fa fa-trash"></i> {{ _i("Delete") }}</button>
            </div>
            <div id="menu-items-tree"></div>
        </div>
        <div class="col-sm-6">
            {!! Form::openGroup('menu_item_association', _i("Associated page")) !!}
            {!! Form::select('menu_item_association', $associationList) !!}
            {!! Form::closeGroup() !!}

            @foreach(Config::get('app.locales') as $lang => $locale)
                <fieldset>
                    <legend>{{ $locale }}</legend>

                    {!! Form::openGroup("menu_item_title_{$lang}", _i("Title (%s)", $lang)) !!}
                    {!! Form::text("menu_item_title_{$lang}") !!}
                    {!! Form::closeGroup() !!}

                    {!! Form::openGroup("menu_item_url_{$lang}", _i("URL (%s)", $lang)) !!}
                    {!! Form::text("menu_item_url_{$lang}") !!}
                    {!! Form::closeGroup() !!}

                    {!! Form::openGroup("menu_item_content_{$lang}", _i("Content (%s)", $lang)) !!}
                    {!! Form::textarea("menu_item_content_{$lang}") !!}
                    {!! Form::closeGroup() !!}
                </fieldset>
            @endforeach

            <fieldset>
                <legend>{{ _i("Advanced options") }}</legend>

                {!! Form::openGroup('menu_item_route', _i("Route")) !!}
                {!! Form::textarea('menu_item_route', null, ['rows' => 1]) !!}
                {!! Form::closeGroup() !!}

                {!! Form::openGroup('menu_item_attributes', _i("Attributes")) !!}
                {!! Form::textarea('menu_item_attributes', null, ['rows' => 1]) !!}
                {!! Form::closeGroup() !!}
            </fieldset>
        </div>
    </div>
@endif

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@if (!empty($object->pk))
    @push('scripts')
    <script>
      $(function () {
        var menuSlug = '{{ $object->slug }}';
        var $menuItemsTree = $('#menu-items-tree');
        var fields = ['association', 'route', 'attributes'];
        var i18nFields = ['title', 'url', 'content'];
        var nodeData = {};

        for (let locale in window.laravel.config.app.locales) {
          if (window.laravel.config.app.locales.hasOwnProperty(locale)) {
            i18nFields.forEach(function (field) {
              fields.push(field + '_' + locale);
            });
          }
        }

        $menuItemsTree.jstree({
          'core': {
            'check_callback': true,
            'multiple': false,
            'data': {
              'url': '{{ route('admin.menus.tree-data', ['pk' => $object->pk]) }}',
              'data': function (node) {
                return {'id': node.id};
              }
            },
            'force_text': true
          },
          'contextmenu': {
            'items': function (n) {
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
          'sort': function (a, b) {
            var nodeA = this.get_node(a);
            var nodeB = this.get_node(b);
            if (nodeA.data && nodeB.data) {
                return nodeA.data.sort > nodeB.data.sort ? 1 : -1;
            }
          },
          "types": {
            "#": {
              "max_depth": 2,
            },
          },
          "plugins": [
            "types",
            "contextmenu",
            "dnd",
            "state",
            "sort"
          ]
        }).on("select_node.jstree", function (e, data) {
          nodeData = data.node.data;
          fields.forEach(function (field) {
            $('#menu_item_' + field)
              .val(field === 'association' ? nodeData.menu_itemable_type + '.' + nodeData.menu_itemable_id : nodeData[field])
              .trigger('change.select2');
          });
        }).on("rename_node.jstree move_node.jstree", function (e, data) {
          var parentId = data.node.parent === '#' ? null : data.node.parent;
          var parent = data.instance.get_node(data.node.parent);
          var sort = typeof data.position === 'undefined' ? parent.children.length : data.position; // Default at end
          var siblings = parent.children; // Not updated siblings
          siblings.splice(data.old_position, 1); // Manually update siblings
          siblings.splice(data.position, 0, data.node.id);

          var ajaxData = {
              id: data.node.id,
              menu_slug: menuSlug,
              parent_id: parentId,
              title: data.node.text,
              sort: sort,
              siblings: siblings
          };

          $.post('{{ route('admin.menus.tree-save') }}', ajaxData)
            .done(function () {
              data.instance.refresh();
            });
        }).on("delete_node.jstree", function (e, data) {
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

          switch ($(this).data('action')) {
            case 'create':
              if (sel.length) {
                sel = sel[0];
                sel = ref.create_node(sel);
              } else {
                sel = ref.create_node('#');
              }

              if (sel) {
                ref.edit(sel);
              }
              break;

            case 'edit':
              if (sel.length) {
                sel = sel[0];
                ref.edit(sel);
              }
              break;

            case 'delete':
              if (sel.length) {
                ref.delete_node(sel);
              }
              break;

            case 'deselect':
              ref.deselect_all();
              break;
          }

        });

        fields.forEach(function (field) {
          $('#menu_item_' + field)
            .on('change', function (e) {
              let val = $(this).val();
              if (field === 'association') {
                if (val) {
                  [nodeData.menu_itemable_type, nodeData.menu_itemable_id] = val.split('.');
                } else {
                  [nodeData.menu_itemable_type, nodeData.menu_itemable_id] = [null, null];
                }
              } else {
                nodeData[field] = val;
              }
              $.post('{{ route('admin.menus.tree-save') }}', nodeData)
                .done(function () {
                  $menuItemsTree.jstree(true).refresh()
                });
            });
        });
      });
    </script>
    @endpush
@endif