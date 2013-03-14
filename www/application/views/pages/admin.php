<div class="container">

	<h2>Users</h2>
	<p>Below is a list of the users.</p>
	
	<div id="infoMessage"><?php echo $message;?></div>
	<p> <? ?> </p>
	<table class="table">
		<thead>
        <tr>
			<th>First Name</th>
			<th>Last Name</th>
            <th>IP address</th>
            <th>Last login</th>
			<th>Groups</th>
		</tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user):?>
        <tr>
            <td><?php echo $user->first_name;?></td>
            <td><?php echo $user->last_name;?></td>
            <td><?php echo $user->ip_address;?></td>
            <td><?php
                $format = 'DATE_RFC822';
                echo standard_date($format, $user->last_login);?></td>
            <td>
                <?php foreach ($user->groups as $group):?>
                <?php echo anchor("auth/edit_group/".$group->id, $group->name) ;?><br />
                <?php endforeach?>
            </td>
            <td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
        </tr>
        <?php endforeach;?>
        </tbody>
	</table>

    <p><a href="<?php echo site_url('auth/create_user');?>">Create a new user</a> | <a href="<?php echo site_url('auth/create_group');?>">Create a new group</a></p>
	
</div>
