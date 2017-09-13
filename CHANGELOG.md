# Changelog

## [Unreleased]
### Added
- New helper `SlugModel` and `UuidModel` base models that override the primary identifier.

### Changed
- Traits no longer have the `With` prefix.

## [0.3.0] - 2017-07-28
### Added
- New `WithIpAddress` trait that adds requester's IP address. ([#1](https://github.com/joelshepherd/create-with/pull/1))
- New method that can override the text to slug conversion function.

## [0.2.0] - 2017-07-06
### Added
- Handler for maximum attempts at finding a unique value.

### Changed
- Existing values will be left untouched if they are already unique.
- Generation code moved to a callback so it can be overwritten.
- Minimum PHP version requirement to 7.0.

## 0.1.0 - 2017-07-05
### Added
- New `WithUuid` trait that provides UUIDs.
- New `WithSlug` trait that provides slug generation.

[Unreleased]: https://github.com/joelshepherd/create-with/compare/0.3.0...HEAD
[0.3.0]: https://github.com/joelshepherd/create-with/compare/0.2.0...0.3.0
[0.2.0]: https://github.com/joelshepherd/create-with/compare/0.1.0...0.2.0
