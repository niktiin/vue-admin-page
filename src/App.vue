<template>
  <div class="wrapper" id="app">
    <header class="header">
      <div class="header__title-group">
        <h1 class="header__title">vue-cli</h1>
        <h2 class="header__subtitle">Admin-panel</h2>
      </div>
      <div class="filter">
        <button class="filter__button filter__button_show">
          <span class="material-icons filter__sort-icon">sort</span>
          По умолчанию
        </button>
      </div>
    </header>
    <router-view/>
  </div>
</template>

<style lang="scss">
  .wrapper {
    min-width: 350px;
  }
  .header {
    width: 100%;
    height: 100px;

    display: grid;
    grid-template-columns: 1fr auto;

    padding: 0 20px;
    align-items: center;

    .header__title {
      font-size: 24px;
      text-transform: uppercase;
    }
    .header__subtitle {
      font-size: 16px;
      font-weight: 400;
    }
  }
  .filter {
    .filter__button {
      border: none;
      border-radius: 4px;
      padding: 12px 15px;

      font-weight: 500;
    }
    .filter__button_show {
      display: flex;
      align-items: center;
      grid-gap: 10px;
    }
  }
</style>
