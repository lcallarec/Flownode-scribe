Flownode-Scribe
===============

The primary goal of Flownode-Scribe is to provide one API for generating multi-format documents : right now, only HTML and PDF formatters
are bundleled, but all other format could be supported.

It means that with the same source code, developpers will be able to output in sevral format, for exemple to build reports or documents from a dynamic data source.

Some PHP libraries offer the ability to parse an HTML document for outputing in PDF format, like TCPDF.
If those solutions are very powerful and very able to build complex PDF documents, they can be are definitively very very slow.

Flownode-Scribe will be kept as fast as possible, simple to use and easy to extend to fit your needs.

Flownode-Scribe documents are easily skinnable thanks to decorators, wich are noting more than closures.

