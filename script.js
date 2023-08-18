  // -------------------------------------------------------------- PAGE 1-------------------------------------------------------

  gsap.to("#hl1",{x:-6300 , duration:15 , repeat:-1 , ease:"linear"})

  gsap.set("#qt1",{opacity:0,y:40})
  gsap.to("#qt1 ",{opacity:1,y:0,duration:2,scrub:true})

  gsap.set("#qt2",{opacity:0,y:40})
  gsap.to("#qt2",{opacity:1,y:0,duration:2,scrub:true})

  // gsap.to("#page1",{opacity:0, scrollTrigger:{trigger:"#page1", start:"center top", end:"bottom top",duration:1}})

  // -------------------------------------------------------------- PAGE 2-------------------------------------------------------

  gsap.set("#p2pic",{opacity:0,y:100})
  gsap.to("#p2pic",{opacity:1, y:0,scrollTrigger:{trigger:"#p2pic",start:"top 80%", end:"top 30%" ,duration:4,scrub:1}}) 

  // ------------------------------------------------------------- PAGE 3----------------------------------------------------------

  gsap.set("#p3pic",{opacity:0,y:100})
  gsap.to("#p3pic",{opacity:1, y:0,scrollTrigger:{trigger:"#p3pic",start:"top 80%", end:"top 30%" ,duration:4,scrub:1}}) 

  // --------------------------------------------------------------- PAGE 4 ------------------------------------------------------------

    gsap.to("#container41",{y:-1000,duration:15,ease:"linear",repeat:-1,yoyo:true})
    gsap.to("#container42",{y:1000,duration:15,ease:"linear",repeat:-1,yoyo:true})

    // gsap.set("#container31>div>img",{opacity:0})
    // gsap.to("#container31>div>img",{opacity:1,scrollTrigger:{trigger:"#container31>div>img",duration:2,start:"top bottom",end:"bottom 90%"}})
  
    gsap.set("#container41",{opacity:0})
  gsap.to("#container41",{opacity:1,scrollTrigger:{trigger:"#container31",start:"top 80%", end:"top 30%" ,duration:2,scrub:1}}) 

  gsap.set("#container42",{opacity:0})
  gsap.to("#container42",{opacity:1,scrollTrigger:{trigger:"#container32",start:"70% 80%", end:"top 30%" ,duration:2,scrub:1}}) 
