<div id="obj_param" class="col-md-12 no_padding">
    <div class="menu-td_ col-md-4 no_padding">
        <div id="category" class="menu-block_">
            <div class="elem-nav-cat-title_">Категория</div>
            <div class="elem-nav-cat_ {{($category == 1) ? "elem-nav-cat-active_" : ""}}">Квартира</div>
            <div class="elem-nav-cat_ {{($category == 2) ? "elem-nav-cat-active_" : ""}}">Дом, дача, участок</div>
            <div class="elem-nav-cat_ {{($category == 3) ? "elem-nav-cat-active_" : ""}}">Комната</div>
        </div>
    </div>
    <div class="menu-td_ col-md-4 no_padding">
        <div id="cat-sdelka" class="menu-block_">
            <div class="elem-nav-cat-title_">Вид сделки</div>
            <div class="elem-nav-cat_ {{($deal == "Продажа") ? "elem-nav-cat-active_" : ""}}">Продажа</div>
            <div class="elem-nav-cat_ {{($deal == "Обмен") ? "elem-nav-cat-active_" : ""}}">Обмен</div>
        </div>
    </div>
    <div id="menu-cat-3" class="menu-td_ col-md-4 no_padding">
        @if($category == 1)
            <div id="cat-kvart-2" class="menu-block_">
                <div class="elem-nav-cat-title_">Тип объекта</div>
                <div class="elem-nav-cat_ {{($type == "Вторичка") ? "elem-nav-cat-active_" : ""}}">Вторичка</div>
                <div class="elem-nav-cat_ {{($type == "Новостройка") ? "elem-nav-cat-active_" : ""}}">Новостройка</div>
            </div>
        @elseif($category == 2)
            <div id="cat-house-2" class="menu-block_">
                <div class="elem-nav-cat-title_">Тип объекта</div>
                <div class="elem-nav-cat_ {{($type == "Дом") ? "elem-nav-cat-active_" : ""}}">Дом</div>
                <div class="elem-nav-cat_ {{($type == "Дача") ? "elem-nav-cat-active_" : ""}}">Дача</div>
                <div class="elem-nav-cat_ {{($type == "Коттедж") ? "elem-nav-cat-active_" : ""}}">Коттедж</div>
                <div class="elem-nav-cat_ {{($type == "Таунхаус") ? "elem-nav-cat-active_" : ""}}">Таунхаус</div>
            </div>
        @else
            <div id="cat-comnt-2" class="menu-block_">
                <div class="elem-nav-cat-title_">Тип объекта</div>
                <div class="elem-nav-cat_ {{($type == "Гостиничного") ? "elem-nav-cat-active_" : ""}}">Гостиничного</div>
                <div class="elem-nav-cat_ {{($type == "Коридорного") ? "elem-nav-cat-active_" : ""}}">Коридорного</div>
                <div class="elem-nav-cat_ {{($type == "Секционного") ? "elem-nav-cat-active_" : ""}}">Секционного</div>
                <div class="elem-nav-cat_ {{($type == "Коммунальная") ? "elem-nav-cat-active_" : ""}}">Коммунальная</div>
            </div>
        @endif
    </div>
</div>