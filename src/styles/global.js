import { createGlobalStyle } from 'styled-components';

//Estilizações globais
export default createGlobalStyle `
  *{
    outline: 0;
    box-sizing: border-box;
  }
  body, html, #root {
    min-height: 100vh;
  }
  body{
    font-size: 100%;
    margin: 0;
    padding: 0;
    -webkit-font-smoothing: antialiased !important;
  }
  a{
    text-decoration: none;
  }
  li{
    list-style: none;
  }
  img{
    max-width: 100%;
  }
`;
