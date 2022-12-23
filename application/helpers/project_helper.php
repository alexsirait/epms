<?php

function is_logged_in()

{
	$ci = get_instance();
	if (!$ci->session->userdata('username')) {
		redirect('login');
	} else {

        $level_id = $ci->session->userdata('level_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $useraccess = $ci->db->get_where('user_access_menu', ['level_id' => $level_id, 'menu_id' => $menu_id]);

        if ($useraccess->num_rows() > 1) {
            redirect('home/lock');
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('level_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
