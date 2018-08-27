<div class="spinner-wrapper">
<div class="spinner">
  <div class="double-bounce1"></div>
  <div class="double-bounce2"></div>
</div>
</div>

<div class="container"></div>
<div class="cd-articles">
    <article style='margin-top: 50px;'>
        <div class="row gallery">
            <?php for($i=1; $i<=151; $i++){
                    echo "<div class='col-xs-4 gallery portrait'><img class='img-responsive img-thumbnail pointer grow' src='./resource/image/pokemons/" . $i . ".svg'><div class='caption text-center' text-center>TEST</div></div>";}
            ?>
        </div>
    </article>
    <article>
        <div class="row gallery" style='margin-top: 50px;'>
            <?php for($i=152; $i<=251; $i++){
                    echo "<div class='col-xs-3 gallery portrait'><img class='img-responsive img-thumbnail pointer grow' src='./resource/image/pokemons/" . $i . ".svg'><div class='caption text-center' text-center>TEST</div></div>";}
            ?>
        </div>
    </article>
    <aside class="cd-read-more">
        <ul>
            <li>
                <a href="#">
               <em>First Generation</em>
               <svg x="0px" y="0px" width="36px" height="36px" viewBox="0 0 36 36"><circle fill="none" stroke="#bf4747" stroke-width="2" cx="18" cy="18" r="16" stroke-dasharray="100 100" stroke-dashoffset="100" transform="rotate(-90 18 18)"></circle></svg>
            </a>
            </li>
            <li>
                <a href="#">
               <em>Second Generation</em>
               <svg x="0px" y="0px" width="36px" height="36px" viewBox="0 0 36 36"><circle fill="none" stroke="#bf4747" stroke-width="2" cx="18" cy="18" r="16" stroke-dasharray="100 100" stroke-dashoffset="100" transform="rotate(-90 18 18)"></circle></svg>
            </a>
            </li>
        </ul>
    </aside>
</div>

<script src="./resource/read_indicator.js"></script>
