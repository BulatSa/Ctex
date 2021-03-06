<?php
class ControllerAgooRelatedRelated extends Controller
{
	private $error = array();
	protected  $data;

	public function index($data)
	{
		$this->data = $data;
		$ver = VERSION;
 		if (!defined('SCP_VERSION')) define('SCP_VERSION', $ver[0]);
        $this->data['related_template'] = 'agoo/latest/latest.tpl';
       	$this->language->load('agoo/related/related');

        $this->load->model('catalog/blog');
        $this->load->model('catalog/record');

		if (isset($this->data['id']))	{
			$this->data['categories'] = $this->model_catalog_blog->getCategories(0);
			if (isset($this->request->post['record_blog'])) {
				$this->data['record_blog'] = $this->request->post['record_blog'];
			} elseif (isset($this->request->get['record_id'])) {
				$this->data['record_blog'] = $this->model_catalog_record->getRecordCategories($this->request->get['record_id']);
			} else {
				$this->data['record_blog'] = array();
			}
			$all_blogs = Array(
				'blog_id' => -1,
				'name' => $this->language->get('text_all_blogs'),
				'status' => 1,
				'sort_order' => -1
			);
			array_unshift($this->data['categories'], $all_blogs);
		}

        if (!isset($this->data['id'])) {
         $this->data['id'] = false;
        }
		if (isset($this->data['id']) && !isset($this->data['ascp_widgets'][$this->data['id']]['anchor'])) {
			$this->data['ascp_widgets'][$this->data['id']]['anchor'] = '';
		}



		$this->data['positions'] = array(
		'content_top' => $this->language->get('entry_position_content_top') ,
		'content_bottom' => $this->language->get('entry_position_content_bottom'),
		'column_left' => $this->language->get('entry_position_column_left'),
		'column_right' => $this->language->get('entry_position_column_right'),
		'header' => $this->language->get('entry_position_header'),
		'footer' => $this->language->get('entry_position_footer')
		);


		$this->data['block_records_width_templates'] = array(
		$this->language->get('entry_block_records_width_templates_2') => '49%',
		$this->language->get('entry_block_records_width_templates_3') => '32%',
		$this->language->get('entry_block_records_width_templates_4') => '24%',
		$this->language->get('entry_block_records_width_templates_5') => '19%',
		$this->language->get('entry_value_templates_clear') => ""
		);

if (SCP_VERSION > 1) {
$this->data['ascp_widgets'][$this->data['id']]['anchor_templates'] = array(

$this->language->get('entry_anchor_templates_menu') => "$('#cmswidget-'+cmswidget).remove();
data = $(data).html();
$('#menu ul:first').append(data);",

$this->language->get('entry_anchor_templates_menu_1') => "$('#cmswidget-'+cmswidget).remove();
data = $(data).html();
$('#menu ul:first > li:nth-child(1)').after(data);",

$this->language->get('entry_anchor_templates_tab') =><<<EOF
$('#cmswidget-'+cmswidget).remove();
data = $(data).html();
$('.nav-tabs').append ('<li><a data-toggle=\'tab\' href=\'#tab-html-'+cmswidget+'\'>'+heading_title+'</a></li>');
$('.tab-content').append($(data).html());
EOF
,

$this->language->get('entry_anchor_templates_footer') => "$('#cmswidget-'+cmswidget).remove();
$(data).find('div, li, a').removeClass();
data = $(data).html();
$('footer .row ul:first').append(data);",

$this->language->get('entry_anchor_templates_footer_1') => "$('#cmswidget-'+cmswidget).remove();
$(data).find('div, li, a').removeClass();
data = $(data).html();
$('footer .row > div:nth-child(2) > ul:first > li:nth-child(2)').after(data);",

$this->language->get('entry_anchor_templates_sitemap') => "$('#cmswidget-'+cmswidget).remove();
$(data).find('div, ul, li, a').removeClass();
data = $(data).html();
$('#content > .row > div:nth-child(2) > ul').append(data);",

$this->language->get('entry_anchor_templates_html') => "$('#cmswidget-'+cmswidget).remove();
data = $(data).html();
$('".$this->language->get('text_anchor_templates_selector')."').html(data);",

$this->language->get('entry_anchor_templates_prepend') => "$('#cmswidget-'+cmswidget).remove();
data = $(data).html();
$('".$this->language->get('text_anchor_templates_selector')."').prepend(data);",

$this->language->get('entry_anchor_templates_append') => "$('#cmswidget-'+cmswidget).remove();
data = $(data).html();
$('".$this->language->get('text_anchor_templates_selector')."').append(data);",

$this->language->get('entry_anchor_templates_before') => "$('#cmswidget-'+cmswidget).remove();
data = $(data).html();
$('".$this->language->get('text_anchor_templates_selector')."').before(data);",

$this->language->get('entry_anchor_templates_after') => "$('#cmswidget-'+cmswidget).remove();
data = $(data).html();
$('".$this->language->get('text_anchor_templates_selector')."').after(data);",

$this->language->get('entry_anchor_templates_clear') => ""
);
} else {

$this->data['ascp_widgets'][$this->data['id']]['anchor_templates'] = array(

$this->language->get('entry_anchor_templates_menu') => "$('#cmswidget-'+cmswidget).remove();
data = $(data).html();
$('#menu ul:first').append(data);",

$this->language->get('entry_anchor_templates_menu_1') => "$('#cmswidget-'+cmswidget).remove();
data = $(data).html();
$('#menu ul:first > li:nth-child(1)').after(data);",

$this->language->get('entry_anchor_templates_tab') =><<<EOF
$('#cmswidget-'+cmswidget).remove();
data = $(data).html();
$('#tabs').append ('<a href=\'#tab-html-'+cmswidget+'\'>'+heading_title+'</a>');
$('#tab-description').after(data);
$('#tabs a').each(function() {
   var obj = $(this);
   $(obj.attr('href')).hide();
   $(obj).unbind( 'click' );
});
$('#tabs a').tabs();
EOF
,

$this->language->get('entry_anchor_templates_footer') => "$('#cmswidget-'+cmswidget).remove();
$(data).find('div, li, a').removeClass();
data = $(data).html();
$('#footer .column ul:first').append(data);",

$this->language->get('entry_anchor_templates_footer_1') => "$('#cmswidget-'+cmswidget).remove();
$(data).find('div, li, a').removeClass();
data = $(data).html();
$('#footer .column:nth-child(2) > ul:first > li:nth-child(2)').after(data);",

$this->language->get('entry_anchor_templates_sitemap') => "$('#cmswidget-'+cmswidget).remove();
$(data).find('div, ul, li, a').removeClass();
data = $(data).html();
$('.sitemap-info > .right > ul:first').append(data);",

$this->language->get('entry_anchor_templates_html') => "$('#cmswidget-'+cmswidget).remove();
data = $(data).html();
$('".$this->language->get('text_anchor_templates_selector')."').html(data);",

$this->language->get('entry_anchor_templates_prepend') => "$('#cmswidget-'+cmswidget).remove();
data = $(data).html();
$('".$this->language->get('text_anchor_templates_selector')."').prepend(data);",

$this->language->get('entry_anchor_templates_append') => "$('#cmswidget-'+cmswidget).remove();
data = $(data).html();
$('".$this->language->get('text_anchor_templates_selector')."').append(data);",

$this->language->get('entry_anchor_templates_before') => "$('#cmswidget-'+cmswidget).remove();
data = $(data).html();
$('".$this->language->get('text_anchor_templates_selector')."').before(data);",

$this->language->get('entry_anchor_templates_after') => "$('#cmswidget-'+cmswidget).remove();
data = $(data).html();
$('".$this->language->get('text_anchor_templates_selector')."').after(data);",

$this->language->get('entry_anchor_templates_clear') => ""
);


}

if (SCP_VERSION > 1) {
$this->data['ascp_widgets'][$this->data['id']]['box_begin_templates'] = array(

$this->language->get('entry_box_begin_templates_tab') => '<div id="tab-html-{CMSWIDGET}" class="tab-pane">
	<div class="box" style="display: block">
		<div class="box-content bordernone">
',
$this->language->get('entry_box_begin_templates_empty') => '<div>',
$this->language->get('entry_anchor_templates_clear') => ""
);
} else {

$this->data['ascp_widgets'][$this->data['id']]['box_begin_templates'] = array(
$this->language->get('entry_box_begin_templates_tab') => '<div id="tab-html-{CMSWIDGET}" class="tab-content">
	<div class="box" style="display: block">
		<div class="box-content bordernone">
',
$this->language->get('entry_box_begin_templates_empty') => '<div>',
$this->language->get('entry_anchor_templates_clear') => ""
);

}


if (SCP_VERSION > 1) {
$this->data['ascp_widgets'][$this->data['id']]['box_end_templates'] = array(
$this->language->get('entry_box_end_templates_tab') => '		</div>
	</div>
</div>',
$this->language->get('entry_box_end_templates_empty') => '</div>',
$this->language->get('entry_anchor_templates_clear') => ""
);
} else {

$this->data['ascp_widgets'][$this->data['id']]['box_end_templates'] = array(
$this->language->get('entry_box_end_templates_tab') => '		</div>
	</div>
</div>',
$this->language->get('entry_box_end_templates_empty') => '</div>',
$this->language->get('entry_anchor_templates_clear') => ""
);

}


        return $this->data;
	}
}
?>