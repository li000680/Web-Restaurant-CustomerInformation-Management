<?php $title="WP Eatery - Home"; include 'header.php';
include 'Menuitem.php' ?>

            <div id="content" class="clearfix">
                <aside>
                        <h2><?php echo date("l")?>'s Specials</h2>
                        <hr>
						<?php
						$Array=array();
						$i=0;
						$star='*';
						while($i<6)
						{
						    if($i%2 == 0)
                            {
                                $Array[$i] = new Menuitem("The WP Burger".$star.($i+1), "Freshly made all-beef patty served up with homefries", " - $14");
                            }
						    else
                            {
                                $Array[$i] = new Menuitem("WP Kebobs".$star.($i+1), "Tender cuts of beef and chicken, served with your choice of side", " - $17");
                            }
							$i++;
							$star.='*';
						}
						for($i=0; $i<6; )
                        {
                            echo '<img src="images/burger_small.jpg" alt="Burger" title="'.date('l').'\'s Special - Burger">';
                            echo "<h3>{$Array[$i]->getName()}</h3>";
                            echo "<p>{$Array[$i]->getDescription()}{$Array[$i]->getPrice()}</p>";
                            echo '<hr>';
                            $i++;
                            echo '<img src="images/kebobs.jpg" alt="Kebobs" title="WP Kebobs">';
                            echo "<h3>{$Array[$i]->getName()}</h3>";
                            echo "<p>{$Array[$i]->getDescription()}{$Array[$i]->getPrice()}</p>";
                            $i++;
                        }
						?>
						<hr>
                </aside>
                <div class="main">
                    <h1>Welcome</h1>
                    <img src="images/dining_room.jpg" alt="Dining Room" title="The WP Eatery Dining Room" class="content_pic">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <h2>Book your Christmas Party!</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div><!-- End Main -->
            </div><!-- End Content -->
			<?php include 'footer.php' ?>
        </div><!-- End Wrapper  this dv is included in footer.php-->
    </body>
</html>
