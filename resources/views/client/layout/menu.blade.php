@foreach($childs as $child)
    @if(count($child->childrens) > 0)
        <div class="nav-item dropdown dropright nav-item-custom " id="nav-item-custom-{{$child->id}}">
            <a href="#" class="nav-link "
               data-toggle="dropdown">{{ $child->name }}
                <i class="fa fa-angle-right float-right mt-1"></i>
            </a>
            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                    @include('client.layout.menu', ['childs' => $child->childrens])
            </div>
        </div>
    @else
        <a href="" class="dropdown-item">{{$child->name}}</a>
    @endif

@endforeach


