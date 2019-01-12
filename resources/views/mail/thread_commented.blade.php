<?php
/**
 * @var \App\Models\ThreadMessage $thread_message
 */
?>
<html>
<body>
Thread: {{ $thread_message->thread->title }}<br/>
New comment:<br/>
{{ $thread_message->content }}
</body>
</html>
