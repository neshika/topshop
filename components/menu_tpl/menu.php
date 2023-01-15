
<!-- ul>li*5>a.{Items $} +tab 

<il></il>
    <li><a href="">Items 1</a></li>
    <li><a href="">Items 2</a>
        <ul>
            <li></li>
        </ul>
    </li>
    <li><a href="">Items 3</a></li>
    <li><a href="">Items 4</a></li>
    <li><a href="">Items 5</a></li>
</il>

-->
<li>
    <a href="">
        <?= $category['name']; ?> 
        <?php if (isset ($category['childs'])): //если у категории есть ребенок, то выводим плюсик?>
            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
        <?php endif;?>    

    </a>
    <?php if (isset ($category['childs'])): //если у категории есть ребенок, то выводим детей?>
        <ul>
            <?= $this->getMenuHtml($category['childs']); ?>
        </ul>    
    <?php endif;?> 
</li>
