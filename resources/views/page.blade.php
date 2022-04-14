<?php 
    #Direcionamento global
    #motando view
?>
@if(is_array($page))
    @foreach($page as $key => $item)
        @if(isset($rank[$key]) && $rank[$key])
            @php
                $pg = $item;
            @endphp
            @break
        @endif
    @endforeach
@endif
@include('includes.header', ['title' => $title, 'min' => $min, 'page' => isset($pg) ? $pg : $page, 'client' => isset($client) ? $client : 0, 'section' => isset($section) ? $section : 0])
@if(isset($pg))
    @include($pg, ['client' => isset($client) ? $client : 0, 'section' => isset($section) ? $section : 0])
@elseif(!is_array($page))
    @include($page, ['client' => isset($client) ? $client : 0, 'section' => isset($section) ? $section : 0])
@endif
@include('includes.footer', ['page' => isset($pg) ? $pg : $page])