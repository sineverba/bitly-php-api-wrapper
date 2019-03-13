# Contributing

Contributions are **welcome** and will be fully **credited**. This page details how to 
contribute and the expected code quality for all contributions.

## Pull Requests

We accept contributions via Pull Requests on Github.

- **[PSR-2 Coding Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)** - Check the code style with ``$ composer check-style`` and fix it with ``$ composer fix-style``.

- **Add tests!** - Your patch won't be accepted if it doesn't have tests. We follow TDD patterns, 
so code coverage need to be 100%. Continuous Integrations are enabled, so your PR need to pass them before accepted.

- **Document any change in behaviour** - Make sure the `README.md` and any other relevant documentation are kept up-to-date.

- **Consider our release cycle** - We try to follow [SemVer v2.0.0](http://semver.org/). Randomly breaking public APIs is not an option.

- **Create feature branches** - Don't ask us to pull from your master branch.

   - Create a branch `feature-myawesomefeature` or `hotfix-myhotfix` from `develop`
   - Push your branch against `develop` branch.

- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.

- **Send coherent history** - Make sure each individual commit in your pull request is meaningful. If you had to make multiple intermediate commits while developing, please [squash them](http://www.git-scm.com/book/en/v2/Git-Tools-Rewriting-History#Changing-Multiple-Commit-Messages) before submitting.


## Running Tests

``` bash
$ composer test
$ composer check-style
$ composer fix-style
```

## Exceptions

- All exceptions thrown by code in this package MUST implement appropriate custom exceptions.
 
**Happy coding**!