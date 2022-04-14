<div>

 
    <div id="cabecera">
        @if($title=="true")
            <h1><a href="/">Kubin</a></h1>
        @endif
        <div id="menu">
            <!--Menu cabecera ordenador-->
            @if($tutorial=="true")
                <p><a href="/tutorial">Tutoriales</a></p>
            @endif
            @if($showcase=="true")
                <p><a href="/showcase">Showcase</a></p>
            @endif
            @if($github=="true")
                <p><a href="https://github.com/javmoreno-developer?tab=repositories">Github</a></p>
            @endif
            @if($log=="true")
                <p><a href="/login" id="in">Sign in</a></p>
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
                <h1><a href="/">Kubin</a></h1>
            @endif
            @if($tutorial=="true")
                <p><a href="/tutorial">Tutoriales</a></p>
            @endif
            @if($showcase=="true")
                <p><a href="/showcase">Showcase</a></p>
            @endif
            @if($github=="true")
                <p><a href="https://github.com/javmoreno-developer?tab=repositories">Github</a></p>
            @endif
            @if($log==true)
                <p><a href="/login" id="in">Sign in</a></p>
            @endif    
        </div>
    </div>

</div>