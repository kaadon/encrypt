var keypair = require('keypair');
var forge   = require('node-forge');

const NodeRSA  = require('node-rsa');
var publicKey  = "-----BEGIN PUBLIC KEY-----\r\nMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAvg8AuzlznLlPk9+Qdpjb\r\nzocmgodlse2j1LNn8v70Lbvg08J4+LjwsIW8VIamInp63Ke831H/2afKMduX7unZ\r\nHK7jKFNsF5f2zrv/R1Zj97VjL0/mxaLd6Exi1QVXyqDZabt1zX35xn4hIGD9SwSa\r\nUl/TJtIzUlZ+8L1YmLJycgxzqOgWZbXzAFI77/RqfVcV9CDbphIi96aX2hFlFJMd\n3nLjLtIfd5wsSBIOCoEQirQzj5kl+4R+4nxUI+xR6QUtkcniat89NRhwrI5/UDGz\nBNSiAADbd+9b231uD6VbIDPnfFk2eErLUXrsR4yG7c0GoB0BHoESehMYphzFEDua\n3QIDAQAB\n-----END PUBLIC KEY-----";
var privateKey = "-----BEGIN PRIVATE KEY-----\n" +
    "MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQC+DwC7OXOcuU+T\n" +
    "35B2mNvOhyaCh2Wx7aPUs2fy/vQtu+DTwnj4uPCwhbxUhqYienrcp7zfUf/Zp8ox\n" +
    "25fu6dkcruMoU2wXl/bOu/9HVmP3tWMvT+bFot3oTGLVBVfKoNlpu3XNffnGfiEg\n" +
    "YP1LBJpSX9Mm0jNSVn7wvViYsnJyDHOo6BZltfMAUjvv9Gp9VxX0INumEiL3ppfa\n" +
    "EWUUkx3ecuMu0h93nCxIEg4KgRCKtDOPmSX7hH7ifFQj7FHpBS2RyeJq3z01GHCs\n" +
    "jn9QMbME1KIAANt371vbfW4PpVsgM+d8WTZ4SstReuxHjIbtzQagHQEegRJ6Exim\n" +
    "HMUQO5rdAgMBAAECggEAAmsqdTd78yigjJ8xtXCoi25I3Sxf7O27Qf+uePcpoFNd\n" +
    "vxQgefnQhk6NYP39qz6nxZsU2jqu6NQrzIqg2ld7fdPz7BVzsLEsYOEflIbS6toS\n" +
    "Ew4PP8Cc1lHyiAdzYI6/dYr/KshJn28HeOQDFStP03CIvVu7b3bOUr32HKtYrX7Z\n" +
    "bUtd451jYiGPjsEDrFeH+Pv/DYd1lgoxv0Qv3pmtMA9Sa7kKjcAqMIrDS1f9m/j2\n" +
    "LcNd+QCXbhDsmHlyE6R0SYXRU0inOJA7llmQeX9UdvsheRL5hyV6kZhKVUlJjYtI\n" +
    "l+qwj3ToNIlniXQFtDUUss+X01U2THbr45MBqecOOQKBgQD0NABiwrJwIu9Qzhsn\n" +
    "2YfJy74qr9izDSbZjAxv6raKShle3NB2QhfhQW+vCTSHyKk+Nm87xRPFzmDaEdFB\n" +
    "oyorId1weoGwPkmPvYQfXp8YqC0E7Enp7xJjwl9nl5pVDR+MMLojyDJuXbudk0nE\n" +
    "/keav1IO9VxZEsXbioAgvo4cFwKBgQDHPWjfiXOM1brNkWeOWSg3vZMtuyHELN5Z\n" +
    "ygyW/mnXML1vvZsNpaQ8EzvmCEV9GuJk23OqQLQeyRoLwHF0nrWVKyI1cBCoN2+t\n" +
    "L8LohPiGAeuePe/aKz1wtWZ9FVH6xNs4jE1G00Be9u/Im9b3452zH++VykhxrOmt\n" +
    "TRBKaMkVKwKBgQDrEu/YIhHBDnAO+gh8CNPE9oMd9l6EpcFjI4SJa4jCgGgBwFBP\n" +
    "tnnkVahb92GA4DHC+IWFJMZO4MasxQAJzjZ2hMf0UYlsDdmkK8v2opBGHQYROiBA\n" +
    "t+mc7GwIfZCMFPDsc6+LaFjbkxFas4EMx7ZICanFSn3WJNMf7ig+3RBRiwKBgQCH\n" +
    "pZSgFEm6Sc1LpcJWVPcftA7fJLehg1bC1N/rcT0ICCQBTpqhGPQO/p1aSKleuo4G\n" +
    "Uq6V7EV1bD8yXwwfdOp1q483yJtem5eJ1qmhet5lBiuvacXByIylDqu/X2OYEqyZ\n" +
    "/FOkc7EwtnicIRWjYbF9QbHxTm4yDqJtnbkIn/y/TwKBgC7fY4R79kMx4YV7mSyM\n" +
    "FCKtASbCkPZxEJ1GyGtQ/uPKddPebWbjpEaCySj4YRSnBvJVDvLkvEPSqj/Afc2m\n" +
    "vR3uf/o+KB3HwxB916S6zb+6pChLL46kYzCMfJj/8NUiJs9coZUkYwqnoRW0Qe0t\n" +
    "nBL7EbpMmZll+EJH7NBMJ0sp\n" +
    "-----END PRIVATE KEY-----";
var text = Buffer.from("123456")
// // var ssh = forge.ssh.publicKeyToOpenSSH(publicKey, 'user@domain.tld');
// // console.log(ssh);
const key = new NodeRSA(publicKey, 'pkcs8-public-pem', {
    hash: 'sha256'
});
console.log(key.getKeySize())
console.log(key.getMaxMessageSize())
console.log(key)
var a = key.encrypt(text, 'base64',"Buffer")
console.log(JSON.stringify(a))
//
// const key1 = new NodeRSA(privateKey, 'pkcs8-private',"sha256");
// console.log(key1)
// var a1 = key1.decrypt(a,'utf8',"base64")
//
//     console.log(a1)

