@extends('layouts.admin')


@section('body')
<p class="alert alert-success text-center"> ڕاپۆرتی فرۆشتنی خواردن بۆ ساڵی {{$year}} مانگی {{$month}} </p>
<table class="text-center">
    <thead >
        <tr>
            <th>كۆی نرخ</th>
            <th>ژمارەی فرۆشراو</th>
            <th>نرخ</th>
            <th>سایز</th> 
            <th>ناوی خواردن</th>
        </tr>
    </thead>
    <tbody>
                            
         @foreach($order as $row=>$count)
            @foreach($count as $rows)
                    @php $food= $rows @endphp
                 @endforeach
                    @foreach($food->orders()->where('id','=',$row)->get()->groupBy('name') as $foods=>$foodCount)
                        @foreach($foodCount as $foodsRow)
                            
                            
                            </tr>   
                            <th>{{$foodsRow->price*$count->count()}}</th>
                            <th>{{$count->count()}}</th>
                            <th>{{$foodsRow->price}}</th>
                            @if($foodsRow->size=="")
                            <th>نییەتی</th>
                            @else
                            <th>{{$foodsRow->size}}</th>
                            @endif
                            <th>{{$foodsRow->name}}</th>
                            </tr>
                            
                        
                        @endforeach
                    @endforeach
             @endforeach
        @endsection
       
    </tbody>
</table>


