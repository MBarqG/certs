<nav class="flex-div">
    <div class="navStart flex-div">
        <img src="{{ asset('images/menu.png') }}" class="menu-icon">
    </div>
    <div class="navMid flex-div">
        <div class="Search-box flex-div">
            <form method="GET" action="/Search">
                <input autocomplete="off" type="text" placeholder="Search" name="domain">
                <input class="hidden" type="number" value="0" name="certnumber">
                <button class="hiddenbutton" type="submit"><img
                        src="{{ asset('images/search-icon.png') }}"></button>
            </form>
        </div>
    </div>
    <div class="navEnd flex-div">
    </div>
</nav>
