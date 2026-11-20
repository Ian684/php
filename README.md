# PHP Practice

Forty standalone PHP exercises covering language fundamentals, databases,
security, networking, and standard-library APIs.

Run one exercise:

```sh
php exercises/27_password-hash.php
```

Run syntax checks and every exercise:

```sh
for file in exercises/*.php; do php -l "$file" >/dev/null || exit 1; php "$file" >/dev/null || exit 1; done
```

Each file declares its exercise number and implements behavior appropriate to
its filename, including password hashing, HMAC, filesystem operations,
transactions, streams, and OpenSSL.
