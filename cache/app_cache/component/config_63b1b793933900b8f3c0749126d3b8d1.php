<?php $this->get_cache=array (
  'label' => 'LinkChecker',
  'id' => 'linkchecker',
  'component' => 'LinkChecker',
  'version' => '2.3',
  'author' => 'Alfasado Inc.',
  'author_link' => 'https://alfasado.net/',
  'description' => 'It provides a broken link check function.',
  'cfg_template' => 'cfg_template.tmpl',
  'cfg_system' => 1,
  'cfg_space' => 1,
  'config_settings' => 
  array (
    'linkchecker_useragent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36',
    'linkchecker_ignore_stream_context' => false,
    'linkchecker_can_all_scope' => true,
    'linkchecker_parallel' => 15,
    'linkchecker_retry_outlink' => false,
    'linkchecker_open_external' => true,
    'linkchecker_worker_async' => true,
    'linkchecker_max_exec_time' => 36000,
    'linkchecker_print_state' => true,
  ),
  'settings' => 
  array (
    'linkchecker_member_name' => '',
    'linkchecker_sunday' => false,
    'linkchecker_monday' => false,
    'linkchecker_tuesday' => false,
    'linkchecker_wednesday' => false,
    'linkchecker_thursday' => false,
    'linkchecker_friday' => false,
    'linkchecker_saturday' => false,
    'linkchecker_exclude_paths' => '',
    'linkchecker_time' => '00:00',
    'linkchecker_all_scope' => false,
    'linkchecker_email_separator' => '-------------------------------',
    'linkchecker_only_errors' => true,
    'linkchecker_outer_link' => false,
    'linkchecker_dynamic' => false,
    'linkchecker_exclude_nofollow' => true,
    'linkchecker_username' => '',
    'linkchecker_password' => '',
    'linkchecker_digest' => false,
    'linkchecker_email_to' => '',
    'linkchecker_email_from' => '',
    'linkchecker_email_subject' => '<mt:trans phrase="[%s] The report of broken link check" params="$app_name" component="LinkChecker"> : <mt:if name="total_error"><mt:trans phrase="%1$s broken links found in %2$s page(s)." params="\'$broken_links\',\'$total_error\'" component="LinkChecker"><mt:else><mt:trans phrase="Found no broken links." component="LinkChecker"></mt:if>',
    'linkchecker_email_body' => '<mt:for merge_linefeeds="1"><mt:trans phrase="\'%s\' broken link check was performed." params="$app_name" component="LinkChecker">
<mt:trans phrase="It checked the links on %s pages." params="$check_pages" component="LinkChecker"><mt:if name="total_error"><mt:trans phrase="%1$s broken links found in %2$s page(s)." params="\'$broken_links\',\'$total_error\'" component="LinkChecker"><mt:else><mt:trans phrase="Found no broken links." component="LinkChecker"></mt:if>
<mt:loop name="results">
- <mt:var name="__key__">
<mt:isarray name="__value__"><mt:count name="__value__" setvar="errors_count"><mt:loop name="__value__"><mt:if name="__first__">  <mt:trans phrase="%s broken links found" params="$errors_count" component="LinkChecker">:
</mt:if>  <mt:trans phrase="\'%s\' does not exist." params="$__value__" component="LinkChecker">
</mt:loop><mt:else>    <mt:if name="__value__" eq="OK"><mt:trans phrase="Found no broken links." component="LinkChecker"><mt:elseif name="__value__" eq="ERROR"><mt:trans phrase="Parse failed while checking the HTML." component="LinkChecker"><mt:elseif name="__value__" eq="404ERROR"><mt:trans phrase="Could not get page." component="LinkChecker"></mt:if>
</mt:isarray>
</mt:loop>
</mt:for>',
    'linkchecker_email_footer' => '<mt:include module="(Website) Mail Footer">',
  ),
  'menus' => 
  array (
    'linkchecker_linkcheck' => 
    array (
      'display_system' => 1,
      'display_space' => 1,
      'component' => 'LinkChecker',
      'mode' => 'linkchecker_linkcheck',
      'permission' => 'can_linkchecker',
      'label' => 'Broken Link Check',
      'order' => 1000,
    ),
  ),
  'hooks' => 
  array (
    'linkchecker_post_run' => 
    array (
      'post_run' => 
      array (
        'component' => 'LinkChecker',
        'priority' => 1,
        'method' => 'linkchecker_post_run',
      ),
    ),
    'linkchecker_start_app' => 
    array (
      'start_app' => 
      array (
        'component' => 'LinkChecker',
        'priority' => 1,
        'method' => 'linkchecker_start_app',
      ),
    ),
  ),
  'methods' => 
  array (
    'linkchecker_linkcheck' => 
    array (
      'component' => 'LinkChecker',
      'permission' => 'can_linkchecker',
      'method' => 'app_linkcheck',
    ),
  ),
  'tasks' => 
  array (
    'linkchecker_linkcheck' => 
    array (
      'label' => 'Broken Link Checks',
      'component' => 'LinkChecker',
      'priority' => 100,
      'method' => 'linkchecker_linkcheck',
      'frequency' => 1200,
    ),
  ),
);