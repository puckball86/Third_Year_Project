/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


canvas               = O('logo');
context              = canvas.getContext('2d');
image                = new Image();
image.src            = 'logo.gif';

image.onload = function()
{
  context.drawImage(image, 50, 32);
};

function O(obj)
{
  if (typeof obj === 'object'){
      return obj;
  }
  else return document.getElementById(obj);
}

function S(obj)
{
  return O(obj).style;
}

function C(name)
{
  var elements = document.getElementsByTagName('*');
  var objects  = [];
  for (var i = 0 ; i < elements.length ; ++i)
    if (elements[i].className === name)
      objects.push(elements[i]);
  return objects;
}