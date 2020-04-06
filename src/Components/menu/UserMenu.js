import React, { Component, useState } from 'react';

import UserIcon from '../../assets/userIcon.png';
import Logo from "../../assets/logo.png";

import { FaBars, FaHome, FaDownload, FaTicketAlt, FaNewspaper} from 'react-icons/fa';
import { Collapse, ShowUser, Nav, IconDiv, ToggleButton } from './Style';

export default function UserMenu ({UserInfo}) {

  const [openMenu, setOpenMenu] = useState(false);

  const toggle = () => {
  	setOpenMenu(!openMenu);
  };

  	return(
  		<Nav>

       <IconDiv className={openMenu !== true ? '' : "openDivicon"} >

        <img src={Logo} alt="logo cineasy"/>

        <ToggleButton onClick={toggle}>
            <FaBars color = 'white' />
        </ToggleButton>

        </IconDiv>
       

        <Collapse className={openMenu !== true ? '' : "open"}>
        <div>
          <ul>
            <li> <FaHome size={20}/> <a href="/"> Home </a> </li>
            <li> <FaDownload size={20}/> <a href="/"> Download App </a> </li>
            <li> <FaTicketAlt size={20}/> <a href="/">  Redes de cinema </a> </li>
            <li> <FaNewspaper size={20}/> <a href="/"> Novidades </a> </li>
          </ul>
		</div>
          <ShowUser> 
          	<span>{UserInfo.nome}</span>
			<img src={UserInfo.imageUrl} alt="User"/>
          </ShowUser>

        </Collapse>

        </Nav>
	);
}