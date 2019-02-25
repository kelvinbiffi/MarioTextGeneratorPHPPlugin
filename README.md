# Mario Text Generator PHP Plugin

MarioTextGeneratorJSPlugin is a PHP Class for generate text paragraths and sentences with Mario World words.

## Installation

Clone the repository and download de PHP file

## Usage

Parameters values:
 * TYPE: PARAGRAPH or SENTENCE
 * LENGTH: LENGTH OF THE PARAGRAPH or SENTENSE YOU WANT
 * MODE: SHORT, MEDIUM or LONG (MODE is optional to deffine whether text would be shortest or longest, default value is set as MEDIUM)

The pattern is TYPE LENGTH MODE, see the below example to know more about

```php
require "path/MarioIpsum.php";

$MarioIpsum = new MarioIpsum();

$text = $MarioIpsum->createText('PARAGRAPH', 2, 'SHORT');

echo $text;
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.