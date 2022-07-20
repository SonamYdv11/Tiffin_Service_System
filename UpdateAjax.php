<?php 
session_start();
$con=mysqli_connect("localhost","root","","contact_us");

if(isset($_GET["tname"]))
{
    
    $tname=$_GET["tname"];
    $sql=mysqli_query($con,"SELECT * from add_tiffin where tname='$tname'");
    $row=mysqli_fetch_row($sql);

    $id=$row[0];
    $category=$row[2];
    $quantity= $row[3];
    $time=$row[4];
    $price=$row[5];

    echo '          <div class="input-text">
                    <label>Tiffin Id</label><br>
                    <input type="text" placeholder="Tiffin Id" name="id" value="'.$id.'" disabled> <br>

                    <label> Tiffin Name</label> <br>
                    <input type="text" placeholder="Decscription" name="tname" value="'.$tname.'">  <br>

                    <label>Category</label><br>
                    <select name="tcategory" value="'.$category.'" > 
                      <option value="Veg">Veg
                      <option value="Nonveg">Nonveg
                    </select>
                    <br>
                    
                    <label>Price</label><br>
                    <input type="text" placeholder=" Old Tiffin Pricee" name="tprice" value="'.$price.'"><br>
                    
                    <label>Quality</label><br>
                    <input type="text" placeholder="choose" value="'.$quantity.'" name="tqty"><br>
      
                    <label>Order timeTime</label><br>
                    <input type="time" placeholder="12:00" value="'.$time.'" name="otime"><br>

                    
                    <input type="submit" name="update" value="Update Tiffin"> 
                </div>
                </form>
            </div>
            </div>';
 
}
?>