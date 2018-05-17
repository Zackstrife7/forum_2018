<div class="container-fluid">
    <header>
        <h1>Conversation n° <?php echo $lastid;  ?> ajoutée | Forum</h1>
    </header>

    <ul class="list">
        <?php
        foreach( $newconv as $key=>$value ){
            switch( $key ){ 
                case 'Status':
                    echo '
                
                <li class="item"><strong>' . $key . '</strong> : ' . ( $value==1 ? 'Fermée' : 'En cours' ) . '</li>';
                            break;
                        default:
                            echo '
                <li class="item"><strong>' . $key . '</strong> : ' . $value . '</li>';
            }
        }
        ?>
    </ul>
   
</div>