function encrypt(message) {
  let secret = CryptoJS.lib.WordArray.random(16)
  const salt = CryptoJS.lib.WordArray.random(16)

  let key = CryptoJS.PBKDF2(secret, salt, {
    keySize: 8,
    iterations: 1000
  })
  let iv = CryptoJS.lib.WordArray.random(8)

  const encryptedMessage = CryptoJS.AES.encrypt(
    message,
    CryptoJS.enc.Utf8.parse(secret.toString()),
    {
      iv: CryptoJS.enc.Utf8.parse(iv.toString()),
      mode: CryptoJS.mode.CBC,
      padding: CryptoJS.pad.ZeroPadding
    }
  )

  secret = asymmetricEncrypt(secret)
  iv = asymmetricEncrypt(iv)

  values = {
    key: secret.toString(),
    iv: iv.toString(),
    message: encryptedMessage.toString()
  }

  return values
}

function getPublicKey(success) {
  key = success
}

fetch('public_key.pem')
  .then(data => data.text())
  .then(success => getPublicKey(success))

function asymmetricEncrypt(message) {
  const values = JSON.stringify(message.toString())

  const Encryptor = new JSEncrypt()
  Encryptor.setPublicKey(key)

  const encryptedMessage = Encryptor.encrypt(values)

  return encryptedMessage
}
