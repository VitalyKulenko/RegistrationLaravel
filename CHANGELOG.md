# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [0.1.2] - 2022-04-05

### Added

- Added a stub in case the user has not set an avatar

### Fixed

- Database operations now use model rather than DB facade
- Now using Laravel's built-in validation with Form Request and the Validator facade
- Fixed a bug where layouts were in the role of components, components are now returned
- Fixed page flickering bug, added x-cloak
- Check methods moved to separate __invokable() controllers
- Removed unused empty functions
- "userID" in the table was changed to just "id" because it led to bugs

## [0.1.1] - 2022-12-22

### Added

- Redirect for start page
- Сhapter "Install packages" in README.md

## [0.1.0] - 2022-12-22

### Added

- Registration form page
- List of speakers page
- Authorization page (login and logout)
- Personal account page
- Ability for admin to edit, delete and add entries on the page
- Viewing the list of speakers for ordinary users without ability to edit, delete and add entries