
import React, {useState} from 'react'

import { Navbar, Nav, Button, Container, Image } from "react-bootstrap";
import Carousel from 'react-bootstrap/Carousel';

import AOS from 'aos';
import {  FaGooglePlay, FaApple } from 'react-icons/fa';

import Menu from "../../Components/menu/Menu.js";

import {
     Content, DivDash, BtnContent, Section, DivMovies
} from './Style.js';

import CellImage from '../../assets/CelularCine.png';

export default function Home() {

  function ControlledCarousel() {

    const [index, setIndex] = useState(0);

    const handleSelect = (selectedIndex, e) => {
      setIndex(selectedIndex);

    };

        return (

          <Carousel activeIndex={index} onSelect={handleSelect}>
            <Carousel.Item>
            <DivMovies>

              <img
                className="d-block w-100"
                src="https://cdn.fstatic.com/media/movies/covers/2020/01/nuevo-poster-de-el-hombre-invisible-original.jpg"
                alt="First slide"
              />
              <img
                className="d-block w-100"
                src="https://cdn.fstatic.com/media/movies/covers/2020/01/nuevo-poster-de-el-hombre-invisible-original.jpg"
                alt="First slide"
              />              <img
                className="d-block w-100"
                src="https://cdn.fstatic.com/media/movies/covers/2020/01/nuevo-poster-de-el-hombre-invisible-original.jpg"
                alt="First slide"
              />              <img
                className="d-block w-100"
                src="https://cdn.fstatic.com/media/movies/covers/2020/01/nuevo-poster-de-el-hombre-invisible-original.jpg"
                alt="First slide"
              />
            </DivMovies>
            </Carousel.Item>
            
            <Carousel.Item>
                <DivMovies>

              <img
                className="d-block w-100"
                src="https://upload.wikimedia.org/wikipedia/pt/9/9f/Sonic_the_Hedgehog_2019.jpg"
                alt="First slide"
              />
              <img
                className="d-block w-100"
                src="https://upload.wikimedia.org/wikipedia/pt/9/9f/Sonic_the_Hedgehog_2019.jpg"
                alt="First slide"
              />              <img
                className="d-block w-100"
                src="https://upload.wikimedia.org/wikipedia/pt/9/9f/Sonic_the_Hedgehog_2019.jpg"
                alt="First slide"
              />              <img
                className="d-block w-100"
                src="https://upload.wikimedia.org/wikipedia/pt/9/9f/Sonic_the_Hedgehog_2019.jpg"
                alt="First slide"
              />
            </DivMovies>
            </Carousel.Item>
          </Carousel>
        );
      }


  return (
    <>

        <Menu />

        <Content>

          <DivDash>
            <h3>Descontos exclusivos integrados na plataforma</h3>
            <p>Com o App da Cineasy você tem acesso a comunidades exclusivas do mundo do cinema, a ingressos de cinema, combos e mimos, Além de descontos progressivos em ingressos.</p>
            <p> Eai, tá esperando o que para baixar e virar assinante? </p>
            <BtnContent>
              <button> <span>Disponivel em </span> <FaGooglePlay color="#FFF" size={26} /> Google Play </button>
              <button> <span>Disponivel em </span> <FaApple color="#FFF" size={26}/>  App Store</button>
            </BtnContent>
          </DivDash>
          
            <img src={CellImage} alt=""/>

        </Content>

      <Container>
        <Section>
            <ControlledCarousel />          
        </Section>
      </Container>
  </>
  );
}
