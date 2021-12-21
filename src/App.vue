<template>
  <div class="wrapper" id="app">
    <header class="header">
      <div class="header__title-group">
        <h1 class="header__title">vue-cli</h1>
        <h2 class="header__subtitle">admin-panel</h2>
      </div>
      <div class="filter">
        <button class="filter__show-button">
          <span class="material-icons">sort</span>
          По умолчанию
        </button>
      </div>
    </header>
    <router-view/>
  </div>
</template>

<style lang="scss">
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
      font-size: 18px;
      font-weight: 400;
    }
  }
  .filter {
    .filter__show-button {
      display: flex;
      align-items: center;
      grid-gap: 10px;

      border: none;
      border-radius: 4px;
      padding: 10px 15px;

      font-weight: 500;
    }
  }
</style>
