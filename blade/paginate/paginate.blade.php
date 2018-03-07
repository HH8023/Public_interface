<ul class="list-inline pagebar">
    <li class="pagebar-none"> {{($list->currentPage()-1)*$list->perPage() .'-'.($list->currentPage()-1)*$list->perPage()+$list->count() .' of '.$list->total()}} </li>
    @if($list->currentPage() == 1)
        <li class="disabled"><a href="#">首页</a></li>
        <li class="disabled"><a href="#">上一页</a></li>
    @else
        <li><a href="{{$list->url(1)}}">首页</a></li>
        <li><a href="{{$list->url($list->currentPage()-1)}}">上一页</a></li>
    @endif
    @for($i = 1; $i <= ( $list->lastPage() >= 5 ? 5:$list->lastPage()); $i++)
        @if($list->currentPage() == $i)
            <li><a class="active" href="#">{{$list->currentPage()}}</a></li>
        @else
            <li><a href="{{$list->url(floor($list->currentPage()/5)*5+$i)}}">{{ floor($list->currentPage()/5)*5+$i}}</a></li>
        @endif
    @endfor
    @if($list->currentPage() == $list->lastPage()  || $list->currentPage()+1<$list->lastPage())
        <li class="disabled"><a href="#">下一页</a></li>
        <li class="disabled"><a href="#">尾页</a></li>
    @else
        <li><a href="{{$list->url($list->lastPage()+1)}}">下一页</a></li>
        <li><a href="{{$list->url($list->lastPage())}}">尾页</a></li>
    @endif
    @if($list->lastPage() >1 )
        <li class="pagebar-none" style="margin-right: 10px;">跳至</li>
        <li class="pagebar-num"><input type="text" class="input" placeholder="" id="locatPage"
                   onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"/></li>
        <li class="pagebar-icon"><a><span class="icon-mail-forward text-blue" onclick="locationPage(event)"></span></a></li>
    @else
        <li class="pagebar-none disabled" style="margin-right: 10px">跳至</li>
        <li class="disabled"><input type="text" class="input" placeholder=""/></li>
        <li class="pagebar-icon disabled"><a><span class="icon-mail-forward text-blue" ></span></a></li>
    @endif
</ul>
<script>
    function locationPage(e){
        e.stopPropagation();
        var url="{{$list->url(1)}}",num=$("#locatPage").val(),max="{{$list->lastPage()}}";
        if(num ==0 || num > parseInt(max)){
            layer.msg("输入页数必须大于0小于等于"+max,{skin:'bg-blue-light'});
        }else
        {
            window.location.href=url.substr(0,url.indexOf('?page=')+6)+num;
        }
    }
</script>
