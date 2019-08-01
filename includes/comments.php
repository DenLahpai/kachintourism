<!-- comments -->
<div class="comments">
    <ul>
        <li>
            <span onclick="<? echo "openUserModal($row_Comments->Users_Id);"; ?>">
                <?php
                echo '<img src="data:image/jpeg;base64,'.base64_encode($row_Comments->Profile).'"/>';
                echo $row_Comments->FirstName;
                ?>
            </span>
            &nbsp;
            <?php echo $row_Comments->Comment;  ?>
        </li>
        <li>
            <?php echo $row_Comments->Created; ?>
        </li>
    </ul>
</div>
<!-- end of Comments -->
