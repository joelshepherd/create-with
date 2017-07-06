# Changelog

## [0.2.0] - 2017-07-06
### Added
- Handler for maximum attempts at finding a unique value.

### Changed
- Existing values will be left untouched if they are already unique.
- Generation code moved to a callback so it can be overwritten.
- Minimum PHP version requirement to 7.0.

## [0.1.0] - 2017-07-05
### Added
- New `WithUuid` trait that provides UUIDs.
- New `WithSlug` trait that provides slug generation.
