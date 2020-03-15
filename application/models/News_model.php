<?php 

/**
 * 
 */
class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }


        public function get_news($slug = FALSE)
        {
                if ($slug === FALSE)
                {
                        $query = $this->db->get('news');
                        return $query->result_array();
                }

                $query = $this->db->get_where('news', array('slug' => $slug));
                return $query->row_array();
        }

        public function set_news()
        {
         /*   $this->load->helper('url');*/

            $slug = strtotime(date('Y-m-d H:i:s'));
            //url_title(base64_encode(urlencode($this->input->post('title'))).strtotime(date('Y-m-d H:i:s')), 'dash', TRUE);

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'text' => $this->input->post('text')
            );

            return $this->db->insert('news', $data);
        }
}