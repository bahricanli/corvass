# Changelog

All notable changes to `Corvass` will be documented in this file

## 2.0.0 - 2017-02-28

_This update includes api-breaking changes._

- Corvass client functionality is not handed by this package anymore.
- Inherits the common functionality from `bahricanli/corvass-php`.
- Replaces the `CorvassMessage` class with `ShortMessage` class.
- Adds `MessagesWereSent` and `SendingMessages` events.
- All class names and namespaces which contains `Corvass` has been changed with `Corvass` for better camel case support.
- Updates test for new implementations.
- Updates docs.

## 1.0.0 - 2016-11-22
- First release of the package.
