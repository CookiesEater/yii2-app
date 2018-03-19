module.exports = {
  extends: ['airbnb-base'], // Порядок важен
  env: {
    browser: true,
  },
  rules: {
    // IDE само тут может помочь с мягкими переносами, да и иногда просто бывают такие длинные строки
    'max-len': 'off',

    // Разрешить конструкции типа i++ только в for()
    'no-plusplus': [2, { allowForLoopAfterthoughts: true }],
  },
};
