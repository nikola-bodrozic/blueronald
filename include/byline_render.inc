				<p class="text-muted">  
                   <?php 
                    _e("Written by: ","blueronald");
                    echo "<a href='/?author_name=$pAuthor'>$pDispName</a>";
                    echo "&nbsp;";
                    _e('In: '.$cats, 'blueronald');
                    echo "&nbsp;";
                    _e('On: '.get_the_date(), 'blueronald');
                    ?>
                </p>