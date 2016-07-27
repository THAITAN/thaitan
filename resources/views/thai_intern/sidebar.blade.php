@section("sidebar")


    <div class="sidebar">
      <ul class="list-group">
        <li class="list-group-item sidebar-part">
	        {!! Form::open(array('url' => 'thai_intern/post', 'method' => 'GET')) !!}
	          {{ Form::text('q', null, ['placeholder' => 'search']) }}
	        {{ Form::close() }}
        </li>
        <li class="list-group-item sidebar-part clearfix"><a class="thai-acdn-1" data-target="thai-acdn-01">Job Categoru<span class="arrow arrow-button-1 pull-right"></span></a></li>
          <ul id="thai-acdn-01" class="thai-child-acdn sidebar-child-part">
            @foreach($categories as $category)
              @if($category->id == 1 || $category->id == 2)
                <li><span class="parent-category">{{ $category->name }}</span>
                  @if($category->id == 1)
                  <ul>
                    @foreach($child_categories as $child_category)
                      @if($child_category->cat_id == 1)
                        <li  class="child-category">{!! link_to("/thai_intern/child_category/{$child_category->id}", $child_category->name, array("class"=>"")) !!}</li>
                      @endif
                    @endforeach
                  </ul>
                </li>
                  @elseif($category->id == 2)
                  <ul>
                    @foreach($child_categories as $child_category)
                      @if($child_category->cat_id == 2)
                        <li class="child-category">{!! link_to("/thai_intern/child_category/{$child_category->id}", $child_category->name, array("class"=>"")) !!}</li>
                      @endif
                    @endforeach
                  </ul>
                </li>
                  @endif
              @else
                <li class="normal-category">{!! link_to("/thai_intern/category/{$category->id}", $category->name, array("class"=>"")) !!}</li>
              @endif
            @endforeach
          </ul>
        <li class="list-group-item sidebar-part clearfix"><a class="thai-acdn-2" data-target="thai-acdn-02">Region<span class="arrow arrow-button-2 pull-right"></span></a></li>
          <ul id="thai-acdn-02" class="thai-child-acdn sidebar-child-part">
            @foreach($regions as $region)
              <li class="normal-category">{!! link_to("/thai_intern/region/{$region->id}", $region->name, array("class"=>"")) !!}</li>
            @endforeach
          </ul>
      </ul>
    </div>

@stop
