@section("sidebar")

    <div class="sidebar">
      <ul class="list-group">
        <li class="list-group-item">Search</li>
        <li class="list-group-item clearfix"><a class="thai-acdn-1" data-target="thai-acdn-01">Job Categoru<span class="arrow arrow-button-1 pull-right"></span></a></li>
          <ul id="thai-acdn-01" class="thai-child-acdn">
            @foreach($categories as $category)
              @if($category->id == 1 || $category->id ==2)
                <li class="parent-category">{{$category->name}}
                  @if($category->id == 1)
                  <ul>
                    @foreach($child_categories as $child_category)
                      @if($child_category->cat_id == 1)
                        <li  class="child-category">{{$child_category->name}}</li>
                      @endif
                    @endforeach
                  </ul>
                </li>
                  @elseif($category->id == 2)
                  <ul>
                    @foreach($child_categories as $child_category)
                      @if($child_category->cat_id == 2)
                        <li  class="parent-category">{{$child_category->name}}</li>
                      @endif
                    @endforeach
                  </ul>
                </li>
                  @endif
              @else
                <li>{{$category->name}}</li>
              @endif
            @endforeach
          </ul>
        <li class="list-group-item clearfix"><a class="thai-acdn-2" data-target="thai-acdn-02">Region<span class="arrow arrow-button-2 pull-right"></span></a></li>
          <ul id="thai-acdn-02" class="thai-child-acdn">
            <li>東京</li>
            <li>大阪<li>
          </ul>
      </ul>
    </div>

@stop
