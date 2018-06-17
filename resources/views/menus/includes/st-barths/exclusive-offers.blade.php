<div class="row">
@foreach(range('A', 'C') as $i)
    <div class="col-md">
        <p class="lead">{{ $i }}</p>
        @foreach(range(1, 3) as $j)
            <div class="media mb-2">
                <img src="http://via.placeholder.com/100x100?text={{ "$i.$j" }}" alt="" class="mr-2">
                <div class="media-body">
                    <h5 class="mt-0">Heading {{ "$i.$j" }}</h5>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aspernatur consequatur deleniti, eligendi eos et incidunt libero maiores optio recusandae rem sunt tenetur ullam? Blanditiis dicta in neque quaerat quasi.
                </div>
            </div>
        @endforeach
    </div>
@endforeach
</div>