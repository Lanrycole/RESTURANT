<!-- PRINTS YHE HEADER FILE ONTOP -->
<?php include 'header.php'; ?>

<div id="content" class="clearfix">
    <aside>

        <!-- ADDS THE DAY OF THE WEEK TO SPECIAL -->
        <?php echo "<h2> " . date("l") . "'s Specials </h2>";
        ?>
        <hr>
        <img src="images/burger_small.jpg" alt="Burger" title="Monday's Special - Burger">

        <!-- LINKING MENUITEM.PHP -->
        <!-- USE OF REQUIRE ONCE SO IT DOESNT COMPLAIN ABOUT MULTIPLE INITIALIZATION OF MENUITEM OBJECT -->

        <?php require_once('menuItem.php');

        //DECLARING  FIRST  INSTANCE OF OF MENU ITEM OBJECT
        $menu = new MenuItem;

        //INITIALIZING FIRST MENU ITEM OBJECT 

        $menu->menu("The WP Burger <br>", "Freshly made all-beef patty served up with homefries <br>", 14.00);

        //PRINTING FIRST MENU ITEM USING THE GET METHOD
        echo "<h3>" . $menu->getItemName() . "</h3>";
        echo "<p>" . $menu->getdescription() . "</p>";
        echo "Price $" . $menu->getPrice();
        ?>

        <hr>
        <img src="images/kebobs.jpg" alt="Kebobs" title="WP Kebobs">

        <?php require_once('menuItem.php');


        // DECLARATING SECOND INSTANCE OF OF MENU ITEM OBJECT
        $menu2 = new MenuItem;

        //INITIALIZING SECOND MENU ITEM OBJECT 
        $menu2->menu("WP Kebobs <br>", "Tender cuts of beef and chicken, served with your choice of side <br>", 17.00);

        //PRINTING SECOND MENU ITEM USING THE GET METHOD
        echo "<h3>" . $menu2->getItemName() . "</h3>";
        echo "<p>" . $menu2->getdescription() . " </p>";
        echo "Price $" . $menu2->getPrice();
        ?>

        <hr>
    </aside>
    <div class="main">
        <h1>Welcome</h1>
        <img src="images/dining_room.jpg" alt="Dining Room" title="The WP Eatery Dining Room" class="content_pic">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
        <h2>Book your Christmas Party!</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
    </div><!-- End Main -->
</div><!-- End Content -->

<?php include 'footer.php'; ?> 