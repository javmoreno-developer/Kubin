<div>

 
    <div id="cabecera">
        @if($title=="true")
            <h1><a href="/">Kubin</a></h1>
        @endif
        <div id="menu">
            <!--Menu cabecera ordenador-->
            @if($tutorial=="true")
                <p><a class="cabeceraEnlace" href="{{route("tutorial")}}">{{__("messages.cab_1")}}</a></p>
            @endif
            @if($showcase=="true")
                <p><a class="cabeceraEnlace" href="{{route("showcase")}}">{{__("messages.cab_2")}}</a></p>
            @endif
            @if($github=="true")
                <p><a class="cabeceraEnlace" href="https://github.com/javmoreno-developer?tab=repositories">Github</a></p>
            @endif
            @if($log=="true")
                <p><a class="cabeceraEnlace" href="/login" id="in">{{__("messages.cab_3")}}</a></p>
            @endif    
            <i class="bi bi-list"></i>
        </div>
    </div>

    <!--Menu cabecera mobil-->
    <div id="menuMobile">
        <div id="closeMenu">
            <i class="bi bi-x-lg"></i>
        </div>
        <div id="menuMobileText">
             @if($title=="true")
                <h1><a class="cabeceraEnlace" href="/">Kubin</a></h1>
            @endif
            @if($tutorial=="true")
                <p><a class="cabeceraEnlace" href="/tutorial">{{__("messages.cab_1")}}</a></p>
            @endif
            @if($showcase=="true")
                <p><a class="cabeceraEnlace" href="/showcase">{{__("messages.cab_2")}}</a></p>
            @endif
            @if($github=="true")
                <p><a class="cabeceraEnlace" href="https://github.com/javmoreno-developer?tab=repositories">Github</a></p>
            @endif
            @if($log=="true")
                <p><a class="cabeceraEnlace" href="/login" id="in">{{__("messages.cab_3")}}</a></p>
            @endif    
        </div>
    </div>

</div>