<template>
  <div class="item">
    <img src="temp/orig.webp" alt="" class="item__image">
    <div class="item__price-group">
      <span class="item__price-group-element item__price">1 000 p</span>
      <span class="item__price-group-element item__discount">-15%</span>
      <span class="item__price-group-element item__discount-account">+30 баллов</span>
    </div>
    <div class="item__title">Сумка мужская поясная</div>
    <p class="item__desc">
      Мужская сумка из эко кожи для путешествий и
      спортзала ! Можно носить как за ручки так и
      на плече как дорожную сумку (ремешок в комплекте)
      Очень вместительная ! Можно использовать как
      для деловых встреч.
    </p>
    <button class="item__action">Удалить</button>
  </div>
</template>

<script>
export default {
  name: 'Item'
}
</script>

<style lang="scss">
  .item {
    max-width: 400px;
    min-width: 260px;
    padding: 15px 15px 30px 15px;
    border-radius: 8px;

    display: grid;
    grid-gap: 10px;
    grid-template-rows: auto auto auto 1fr auto;

    -webkit-box-shadow: 4px 4px 30px 0px rgba(34, 60, 80, 0.1);
    -moz-box-shadow: 4px 4px 30px 0px rgba(34, 60, 80, 0.1);
    box-shadow: 4px 4px 30px 0px rgba(34, 60, 80, 0.1);
  }
  .item__image {
    margin-top: 20%;
    margin-bottom: 20%;
  }
  .item__price-group {
    display: grid;
    grid-template-columns: repeat(3, auto);
    justify-content: space-between;
    align-items: center;
  }
  .item__price {
    font-weight: 600;
  }
  .item__price-group-element {
    padding: 2px 0;
    font-size: 18px;
  }
  .item__discount {
    background: #F73D33;
    color: white;
    font-weight: 500;

    padding: 2px 14px;
  }
  .item__discount-account {
    font-size: 16px;
  }
  .item__title {
    color: #2F4CDB;
    font-weight: 500;
    font-size: 18px;
  }
  .item__desc {
    text-align: justify;
  }
  .item__action {
    background: #F73D33;
    color: white;
    border-radius: 4px;
    border: none;
    font-weight: 500;

    padding: 8px;
  }
</style>
