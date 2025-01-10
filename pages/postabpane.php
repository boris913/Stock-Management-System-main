<!-- Conteneur des onglets -->
<div class="tab-content">
  <!-- 1ER ONGLET -->
  <div class="tab-pane fade in mt-2" id="keyboard">
    <div class="row">
      <?php  
      $query = 'SELECT * FROM product WHERE CATEGORY_ID=0 GROUP BY PRODUCT_CODE ORDER BY PRODUCT_CODE ASC';
      $result = mysqli_query($db, $query);

      if ($result):
        if (mysqli_num_rows($result) > 0):
          while ($product = mysqli_fetch_assoc($result)): 
      ?>
      <div class="col-sm-4 col-md-2">
        <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
          <div class="products">
            <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
            <h6>$ <?php echo $product['PRICE']; ?></h6>
            <input type="text" name="quantity" class="form-control" value="1" />
            <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
            <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
            <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info" value="Ajouter" />
          </div>
        </form>
      </div>
      <?php endwhile; ?>
      </div>
    </div>
    <?php
        endif;
      endif;   
    ?>
  </div>

  <!-- 2E ONGLET -->
  <div class="tab-pane fade in mt-2" id="mouse">
    <div class="row">
      <?php  
      $query = 'SELECT * FROM product WHERE CATEGORY_ID=1 GROUP BY PRODUCT_CODE ORDER BY PRODUCT_CODE ASC';
      $result = mysqli_query($db, $query);

      if ($result):
        if (mysqli_num_rows($result) > 0):
          while ($product = mysqli_fetch_assoc($result)): 
      ?>
      <div class="col-sm-4 col-md-2">
        <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
          <div class="products">
            <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
            <h6>$ <?php echo $product['PRICE']; ?></h6>
            <input type="text" name="quantity" class="form-control" value="1" />
            <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
            <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
            <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info" value="Ajouter" />
          </div>
        </form>
      </div>
      <?php endwhile; endif; endif; ?>
    </div>
  </div>

  <!-- 3E ONGLET -->
  <div class="tab-pane fade in mt-2" id="headset">
    <div class="row">
      <?php  
      $query = 'SELECT * FROM product WHERE CATEGORY_ID=6 GROUP BY PRODUCT_CODE ORDER BY PRODUCT_CODE ASC';
      $result = mysqli_query($db, $query);

      if ($result):
        if (mysqli_num_rows($result) > 0):
          while ($product = mysqli_fetch_assoc($result)): 
      ?>
      <div class="col-sm-4 col-md-2">
        <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
          <div class="products">
            <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
            <h6>$ <?php echo $product['PRICE']; ?></h6>
            <input type="text" name="quantity" class="form-control" value="1" />
            <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
            <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
            <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info" value="Ajouter" />
          </div>
        </form>
      </div>
      <?php endwhile; endif; endif; ?>
    </div>
  </div>

  <!-- 4E ONGLET -->
  <div class="tab-pane fade in mt-2" id="cpu">
    <div class="row">
      <?php  
      $query = 'SELECT * FROM product WHERE CATEGORY_ID=7 GROUP BY PRODUCT_CODE ORDER BY PRODUCT_CODE ASC';
      $result = mysqli_query($db, $query);

      if ($result):
        if (mysqli_num_rows($result) > 0):
          while ($product = mysqli_fetch_assoc($result)): 
      ?>
      <div class="col-sm-4 col-md-2">
        <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
          <div class="products">
            <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
            <h6>$ <?php echo $product['PRICE']; ?></h6>
            <input type="text" name="quantity" class="form-control" value="1" />
            <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
            <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
            <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info" value="Ajouter" />
          </div>
        </form>
      </div>
      <?php endwhile; endif; endif; ?>
    </div>
  </div>

  <!-- 5E ONGLET -->
  <div class="tab-pane fade in mt-2" id="monitor">
    <div class="row">
      <?php  
      $query = 'SELECT * FROM product WHERE CATEGORY_ID=2 GROUP BY PRODUCT_CODE ORDER BY PRODUCT_CODE ASC';
      $result = mysqli_query($db, $query);

      if ($result):
        if (mysqli_num_rows($result) > 0):
          while ($product = mysqli_fetch_assoc($result)): 
      ?>
      <div class="col-sm-4 col-md-2">
        <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
          <div class="products">
            <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
            <h6>$ <?php echo $product['PRICE']; ?></h6>
            <input type="text" name="quantity" class="form-control" value="1" />
            <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
            <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
            <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info" value="Ajouter" />
          </div>
        </form>
      </div>
      <?php endwhile; endif; endif; ?>
    </div>
  </div>

  <!-- 6E ONGLET -->
  <div class="tab-pane fade in mt-2" id="motherboard">
    <div class="row">
      <?php  
      $query = 'SELECT * FROM product WHERE CATEGORY_ID=3 GROUP BY PRODUCT_CODE ORDER BY PRODUCT_CODE ASC';
      $result = mysqli_query($db, $query);

      if ($result):
        if (mysqli_num_rows($result) > 0):
          while ($product = mysqli_fetch_assoc($result)): 
      ?>
      <div class="col-sm-4 col-md-2">
        <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
          <div class="products">
            <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
            <h6>$ <?php echo $product['PRICE']; ?></h6>
            <input type="text" name="quantity" class="form-control" value="1" />
            <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
            <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
            <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info" value="Ajouter" />
          </div>
        </form>
      </div>
      <?php endwhile; endif; endif; ?>
    </div>
  </div>

  <!-- 7E ONGLET -->
  <div class="tab-pane fade in mt-2" id="processor">
    <div class="row">
      <?php  
      $query = 'SELECT * FROM product WHERE CATEGORY_ID=4 GROUP BY PRODUCT_CODE ORDER BY PRODUCT_CODE ASC';
      $result = mysqli_query($db, $query);

      if ($result):
        if (mysqli_num_rows($result) > 0):
          while ($product = mysqli_fetch_assoc($result)): 
      ?>
      <div class="col-sm-4 col-md-2">
        <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
          <div class="products">
            <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
            <h6>$ <?php echo $product['PRICE']; ?></h6>
            <input type="text" name="quantity" class="form-control" value="1" />
            <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
            <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
            <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info" value="Ajouter" />
          </div>
        </form>
      </div>
      <?php endwhile; endif; endif; ?>
    </div>
  </div>

  <!-- 8E ONGLET -->
  <div class="tab-pane fade in mt-2" id="powersupply">
    <div class="row">
      <?php  
      $query = 'SELECT * FROM product WHERE CATEGORY_ID=5 GROUP BY PRODUCT_CODE ORDER BY PRODUCT_CODE ASC';
      $result = mysqli_query($db, $query);

      if ($result):
        if (mysqli_num_rows($result) > 0):
          while ($product = mysqli_fetch_assoc($result)): 
      ?>
      <div class="col-sm-4 col-md-2">
        <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
          <div class="products">
            <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
            <h6>$ <?php echo $product['PRICE']; ?></h6>
            <input type="text" name="quantity" class="form-control" value="1" />
            <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
            <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
            <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info" value="Ajouter" />
          </div>
        </form>
      </div>
      <?php endwhile; endif; endif; ?>
    </div>
  </div>

  <!-- 9E ONGLET -->
  <div class="tab-pane fade in mt-2" id="others">
    <div class="row">
      <?php  
      $query = 'SELECT * FROM product WHERE CATEGORY_ID=9 GROUP BY PRODUCT_CODE ORDER BY PRODUCT_CODE ASC';
      $result = mysqli_query($db, $query);

      if ($result):
        if (mysqli_num_rows($result) > 0):
          while ($product = mysqli_fetch_assoc($result)): 
      ?>
      <div class="col-sm-4 col-md-2">
        <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
          <div class="products">
            <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
            <h6>$ <?php echo $product['PRICE']; ?></h6>
            <input type="text" name="quantity" class="form-control" value="1" />
            <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
            <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
            <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info" value="Ajouter" />
          </div>
        </form>
      </div>
      <?php endwhile; endif; endif; ?>
    </div>
  </div>
</div>