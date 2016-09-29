<h1><?= $this->title() ?></h1>
<div class="Description">FirePHP is an extension for Firefox that allows PHP developers to write to the browsers console. Just open up the console for the current window and see the result of the code below (taken from FirePHPs examples)
<pre>
fb('Hello World'); // Defaults to FirePHP::LOG.

fb('Log message', FirePHP::LOG);
fb('Info message', FirePHP::INFO);
fb('Warn message', FirePHP::WARN);
fb('Error message', FirePHP::ERROR);

fb('Message with label', 'Label', FirePHP::LOG);

fb(
    array(
        'key1' => 'val1',
        'key2' => array(array('v1', 'v2'), 'v3')
    ),
    'TestArray',
    FirePHP::LOG
);

fb(array('2 SQL queries took 0.06 seconds', array(
   array('SQL Statement', 'Time', 'Result'),
   array('SELECT * FROM Foo', '0.02', array('row1', 'row2')),
   array('SELECT * FROM Bar', '0.04', array('row1', 'row2'))
  )), FirePHP::TABLE);

// Will show only in "Server" tab for the request.
fb(apache_request_headers(), 'RequestHeaders', FirePHP::DUMP);
</pre>
</div>