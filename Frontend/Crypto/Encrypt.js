function encrypt(data) {
  const message = JSON.stringify(data).toString();

  const secret = CryptoJS.lib.WordArray.random(256);
  const salt = CryptoJS.lib.WordArray.random(16);

  const key = CryptoJS.PBKDF2(secret, salt, {
    keySize: 8,
    iterations: 1000,
  });
  const iv = CryptoJS.lib.WordArray.random(16);

  const encryptedMessage = CryptoJS.AES.encrypt(message, key, {
    iv: CryptoJS.enc.UTF8.parse(iv),
    mode: CryptoJS.mode.CBC,
    padding: CryptoJS.pad.ZeroPadding,
  });
}
