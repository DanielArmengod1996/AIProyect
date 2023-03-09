# HAARPHP 


__Feature Detection Library for PHP__

Based on [Viola-Jones Feature Detection Algorithm using Haar Cascades](http://www.cs.cmu.edu/~efros/courses/LBMV07/Papers/viola-cvpr-01.pdf)
and improvement [Viola-Jones-Lienhart et al Feature Detection Algorithm](http://www.multimedia-computing.de/mediawiki//images/5/52/MRL-TR-May02-revised-Dec02.pdf)

This is a port of [OpenCV C++ Haar Detection](https://github.com/opencv/opencv) and of [JViolaJones Java](http://code.google.com/p/jviolajones/)) to PHP.


**there is also a [`javascript` version: HAAR.js](https://github.com/foo123/HAAR.js)**


![screenshot](/example-screenshot.png)

**see also:**

* [Abacus](https://github.com/foo123/Abacus) advanced Combinatorics and Algebraic Number Theory Symbolic Computation library for JavaScript, Python
* [Plot.js](https://github.com/foo123/Plot.js) simple and small library which can plot graphs of functions and various simple charts and can render to Canvas, SVG and plain HTML
* [HAAR.js](https://github.com/foo123/HAAR.js) image feature detection based on Haar Cascades in JavaScript (Viola-Jones-Lienhart et al Algorithm)
* [HAARPHP](https://github.com/foo123/HAARPHP) image feature detection based on Haar Cascades in PHP (Viola-Jones-Lienhart et al Algorithm)
* [FILTER.js](https://github.com/foo123/FILTER.js) video and image processing and computer vision Library in pure JavaScript (browser and node)
* [Xpresion](https://github.com/foo123/Xpresion) a simple and flexible eXpression parser engine (with custom functions and variables support), based on [GrammarTemplate](https://github.com/foo123/GrammarTemplate), for PHP, JavaScript, Python
* [Regex Analyzer/Composer](https://github.com/foo123/RegexAnalyzer) Regular Expression Analyzer and Composer for PHP, JavaScript, Python
* [GrammarTemplate](https://github.com/foo123/GrammarTemplate) grammar-based templating for PHP, JavaScript, Python
* [codemirror-grammar](https://github.com/foo123/codemirror-grammar) transform a formal grammar in JSON format into a syntax-highlight parser for CodeMirror editor
* [ace-grammar](https://github.com/foo123/ace-grammar) transform a formal grammar in JSON format into a syntax-highlight parser for ACE editor
* [prism-grammar](https://github.com/foo123/prism-grammar) transform a formal grammar in JSON format into a syntax-highlighter for Prism code highlighter
* [highlightjs-grammar](https://github.com/foo123/highlightjs-grammar) transform a formal grammar in JSON format into a syntax-highlight mode for Highlight.js code highlighter
* [syntaxhighlighter-grammar](https://github.com/foo123/syntaxhighlighter-grammar) transform a formal grammar in JSON format to a highlight brush for SyntaxHighlighter code highlighter
* [SortingAlgorithms](https://github.com/foo123/SortingAlgorithms) implementations of Sorting Algorithms in JavaScript
* [PatternMatchingAlgorithms](https://github.com/foo123/PatternMatchingAlgorithms) implementations of Pattern Matching Algorithms in JavaScript



### Contents

* [How to Use](#how-to-use)
* [Detector Methods](#detector-methods)
* [Haar Cascades](#where-to-find-haar-cascades-xml-files-to-use-for-feature-detection)
* [Todo](#todo)
* [Changelog](#changelog)


### How to Use
You can use the __existing openCV cascades__  to build your detectors.

To do this just transform the __opencv xml file__ to *PHP* format
using the __haartophp__ (php) tool (in cascades folder)

__examples:__

to use opencv's *haarcascades_frontalface_alt.xml*  in *php* do:

```bash
haartophp haarcascades_frontalface_alt.xml > haarcascades_frontalface_alt.php
```

this creates a `php` file: `haarcascades_frontalface_alt.php`
which you can include in your `php` application (see examples)

the variable to use in php is similarly: `$haarcascades_frontalface_alt`


#### Detector Methods

__constructor()__
```php
new HaarDetector($haardata);
```

__Explanation of parameters__

* `$haardata` : The actual haardata (as generated by `haartophp` tool), this is specific per feature, openCV haar data can be used.



__clearCache()__
```php
$detector->clearCache();
```

Clear any cached image data and haardata in case space is an issue. Use image method and cascade method (see below) to re-set image and haar data



__cascade()__
```php
$detector->cascade($haardata);
```

Allow to use same detector (with its cached image data), to detect different feature on same image, by using another cascade. This way any image pre-processing is done only once

__Explanation of parameters__

* `$haardata` : The actual haardata (as generated by `haartophp` tool), this is specific per feature, openCV haar data can be used.



__image()__
```php
$detector->image($GDImage, $scale = 1.0);
```

__Explanation of parameters__

* `$GDImage` : an actual `GD` Image object.
* `$scale` : The percent of scaling from the original image, so detection proceeds faster on a smaller image (default __1.0__ ). __NOTE__ scaling might alter the detection results sometimes, if having problems opt towards 1 (slower)



__selection()__
```php
$detector->selection('auto'|array|feature|$x [,$y, $width, $height]);
```

Get/Set a custom region in the image to confine the detection process only in that region (eg detect nose while face already detected)

__Explanation of parameters__

* `1st parameter` : This can be the string `'auto'` which sets the whole image as the selection, or an array ie: `array('x'=>10, 'y'=>'auto', 'width'=>100, 'height'=>'auto')` (every param set as `'auto'` will take the default image value) or a detection rectangle/feature, or a x coordinate (along with rest coordinates).
* `$y` : (Optional) the selection start y coordinate, can be an actual value or `'auto'` (`$y=0`)
* `$width` : (Optional) the selection width, can be an actual value or `'auto'` (`$width=image.width`)
* `$height` : (Optional) the selection height, can be an actual value or `'auto'` (`$height=image.height`)

The actual selection rectangle/feature is available as `$this->selection()` or `$detector->selection()` with no parameters



__cannyThreshold()__
```php
$detector->cannyThreshold(array('low'=> lowThreshold, 'high'=> highThreshold));
```

Set the thresholds when Canny Pruning is used, for extra fine-tuning. 
Canny Pruning detects the number/density of edges in a given region. A region with too few or too many edges is unlikely to be a feature. 
Default values work fine in most cases, however depending on image size and the specific feature, some fine tuning could be needed

__Explanation of parameters__

* `low` : (Optional) The low threshold (default __20__ ).
* `high` : (Optional) The high threshold (default __100__ ).




__detect()__
```php
$detector->detect($baseScale = 1, $scale_inc = 1.25, $increment = 0.1, $min_neighbors = 1 , $epsilon = 0.2, $doCannyPruning = false);
```

__Explanation of parameters__ ([JViolaJones Parameters](http://code.google.com/p/jviolajones/wiki/Parameters))

* `$baseScale` : The initial ratio between the window size and the Haar classifier size (default __1__ ).
* `$scale_inc` : The scale increment of the window size, at each step (default __1.25__ ).
* `$increment` : The shift of the window at each sub-step, in terms of percentage of the window size (default __0.1__ ).
* `$min_neighbors` : The minimum numbers of similar rectangles needed for the region to be considered as a feature (avoid noise) (default __1__ )
* `$epsilon` : Epsilon value that determines similarity between detected rectangles. `0` means identical (default __0.2__ )
* `$doCannyPruning` : enable Canny Pruning to pre-detect regions unlikely to contain features, in order to speed up the execution (optional default __false__ ). 


__Examples included with face detection__



### Where to find Haar Cascades XML files to use for feature detection

* [OpenCV](http://opencv.org/)
* [This resource](http://alereimondo.no-ip.org/OpenCV/34)
* search the web :)
* [Train your own](http://docs.opencv.org/doc/user_guide/ug_traincascade.html) with a little extra help [here](http://note.sonots.com/SciSoftware/haartraining.html) and [here](http://coding-robin.de/2013/07/22/train-your-own-opencv-haar-classifier.html)


#### TODO

- [ ] keep up with the changes in openCV cascades xml format (will try)


#### ChangeLog

__1.0.2__
* port code from latest version of opencv

__1.0.1__
* inline detection routine for further speed
* update test examples with many faces detection

__1.0.0__
* correct detection on custom selection
* refactor code

__0.4__
* refactor code (make smaller)
* add clearCache method, to delete any stored/cached image data in the detector (in case space is an issue)
* add the tilted feature (Lienhart et al, extension)
* make new `haartophp` tool, output format changed, __make sure to re-convert your `.php` haar cascades!!__
* tidy up the repo
* fix some typos, edits


__0.3__
* add new methods (_selection_ , _cascade_ , _cannyThreshold_ )
* use fixed-point arithmetic if possible (eg gray-scale, canny computation)
* optimize array indexing, remove unnecessary multiplications
* reduce unnecessary loops, inline code instead of method calling for speed
* rewrite _merge_ method (features might be slightly different now)
* features are now generic classes not arrays
* code refactor/fixes
* update readme, add method documentation


__0.2__
* add haartophp tool in php (all-php solution)
* optimize array operations, refactor, etc..


__0.1__
* initial release