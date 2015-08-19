<?php

class Image_man extends CI_Model{
    
    public function handle() {
        $check_file_upload = FALSE;
        if (isset($FILES['img_file']['error']) && $FILES['img_file']['error'] != 4) {
            $check_file_upload = TRUE;
        }

        if ($check_file_upload && !$this->upload->do_upload('img_file')) {
            
        } else {
            $upload_data = $this->upload->data();
            if (isset($upload_data['file_name'])) {
                $member->image = $upload_data['file_name'];
            }
            
            $member->save();
            redirect('');
        }
    }
}
