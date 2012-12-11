Yet another PHP Config API
==========================

PHP registry-like configuration interface. Basically it provides all the needed
tools to manage your configuration as a single registry tree, starting from a
root, managing schema defined configuration entries and sub trees.

This was originally inspired by GConf, even if today it's still very far from
being as complete.

Basic usage
-----------

    // You have to start with something
    $config = new MemoryBackend(
        parse_ini_file("config.ini", true));

    // Simple read operation
    if ($config['a.b.c']) {
        do_something();
    }

    // Set a value (schema less if unknown)
    $config['a.b.c'] = 42;

    // Get a sub tree cursor
    $cursor = $config->getCursor('a.b');
    // Works with relative path, this echoes 42
    echo $cursor['c'];

    // You can introspect easily
    foreach ($cursor as $key => $entry) {
        if ($entry instanceof ConfigCursorInterface) {
            // This is a cursor, do whatever you want to do with it
        } else {
            // This is a single value
            echo $key, " is ", $value;
        }
    }

    // And introspect schema too
    $entrySchema = $config->getSchema('a.b.c');
    echo $entrySchema->getShortDescription(), "\n",
         $entrySchema->getType(), "\n";

History
-------

Just commiting this code somewhere I can keep it.

I made this code a while ago, I just needed to see it back for some reason.

I won't lie, this is unfinished. The main goal was to plug it on GConf for a
specific PHP application. Still doable, using php-dbus (search DBus in PECL
site). I may do it some day that's something I'd be terribly curious to
benchmark.

