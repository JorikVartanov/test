<?php
function form(){
?>
<div class="row">
    <div class="col-md-4">
            <form method="post" action="" class="form-horizontal" role="form">
                    <div class="form-group">
                            <label for="inputText" class="col-sm-3 control-label">Text</label>
                            <div class="col-sm-9">
                                    <textarea class="form-control" name="comment" id="inputComment" placeholder="Comment" rows="3"></textarea>
                            </div>
                    </div>
                    <div class="form-group">
                            <label for="inputName" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-9">
                                    <input type="text" name="username" class="form-control" id="inputName" placeholder="Name">
                            </div>
                    </div>
                    <div class="form-group">
                            <label for="inputEmail" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                    </div>
                    <div class="form-group">
                            <label for="inputHomepage" class="col-sm-3 control-label">Homepage</label>
                            <div class="col-sm-9">
                                    <input type="text" name="homepage" class="form-control" id="inputHomepage" placeholder="Homepage">
                            </div>
                    </div>
                    
                    <!--<div class="form-group">
                            <label for="inputPassword" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                            </div>
                    </div> -->
                    
                    <div class="form-group">
                            <label for="inputFile" class="col-sm-3 control-label">File input</label>
                            <div class="col-sm-9">
                                    <input type="file" name="file" id="inputFile" placeholder="File">
                            </div>
                    </div>
                    <div class="form-group">
                            <label for="captcha" class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                    <img src="captcha.php" alt="" name="captcha" id="captcha"/>
                            </div>
                    </div>
                    <div class="form-group">
                            <label for="inputCaptcha" class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                <h6 class="help-block">Введите код с картинки.</h6>
                                    <input type="text" name="inputCaptcha" class="form-control" id="inputCaptcha" placeholder="код с картинки">
                            </div>
                    </div>
                    <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                    <div class="checkbox">
                                            <label>
                                                    <input type="checkbox"> Remember me
                                            </label>
                                    </div>
                            </div>
                    </div>
                    <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" name="submit" class="btn btn-default">Submit</button>
                            </div>
                    </div>
            </form>
    </div>
    <div class="col-md-4">
            
    </div>
    <div class="col-md-4">
            
    </div>
</div>
<?php
}
function tableShow(){
        $mysqli = new mysqli("localhost", "root", "root", "gestbook");
                if (mysqli_connect_errno()) {
                        printf("Не удалось подключиться: %s\n", mysqli_connect_error());
                        exit();
                }
                $select_query = "SELECT user_name, text, email, homepage, date FROM comments ORDER by comments.id_comments DESC LIMIT 0 , 30";
                if ($result = $mysqli->query($select_query)) {
                        ?><table class="table table-bordered">
                                <tr>
                                        <th> <?php echo 'Name'; ?></th>
                                        <th> <?php echo 'Text'; ?></th>
                                        <th> <?php echo 'Email'; ?></th>
                                        <th> <?php echo 'Homepage'; ?></th>
                                        <th> <?php echo 'Date'; ?></th>
                                </tr>
                        <?php		while ($row = $result->fetch_assoc()) {
                        ?>			<tr>
                        <?php			foreach ($row as $value){
                        ?>				<td><?php echo "$value"; ?></td>
                        <?php			}
                        ?>			</tr>
                        <?php		}
                        ?>
                                <?php $result->free(); ?>
                        </table>
                <?php
                }
                $mysqli->close();
}
?>