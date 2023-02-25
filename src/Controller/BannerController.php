<?php

namespace App\Controller;

use App\Entity\Banner;
use App\Form\BannerType;
use App\Repository\BannerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/banner')]
class BannerController extends AbstractController
{
    #[Route('/', name: 'app_banner_index', methods: ['GET'])]
    public function index(BannerRepository $bannerRepository): Response
    {
        return $this->render('banner/index.html.twig', [
            'banners' => $bannerRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_banner_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BannerRepository $bannerRepository, SluggerInterface $slugger): Response
    {
        $banner = new Banner();
        $form = $this->createForm(BannerType::class, $banner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('banners_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                    $this->addFlash('error', 'Error uploading file');

                    return $this->renderForm('banner/new.html.twig', [
                        'banner' => $banner,
                        'form' => $form,
                    ]);                }

                $banner->setImageUrl($newFilename);
            }

            $bannerRepository->save($banner, true);

            return $this->redirectToRoute('app_banner_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('banner/new.html.twig', [
            'banner' => $banner,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_banner_show', methods: ['GET'])]
    public function show(Banner $banner): Response
    {
        return $this->render('banner/show.html.twig', [
            'banner' => $banner,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_banner_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Banner $banner, BannerRepository $bannerRepository, SluggerInterface $slugger): Response
    {
        $banner->setImageUrl(new File($this->getParameter('banners_directory').'/'.$banner->getImageUrl()));
        $form = $this->createForm(BannerType::class, $banner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('banners_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                    $this->addFlash('error', 'Error uploading file');

                    return $this->renderForm('banner/new.html.twig', [
                        'banner' => $banner,
                        'form' => $form,
                    ]);                }

                $banner->setImageUrl($newFilename);
            }

            $bannerRepository->save($banner, true);

            return $this->redirectToRoute('app_banner_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('banner/edit.html.twig', [
            'banner' => $banner,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_banner_delete', methods: ['POST'])]
    public function delete(Request $request, Banner $banner, BannerRepository $bannerRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$banner->getId(), $request->request->get('_token'))) {
            $bannerRepository->remove($banner, true);
        }

        return $this->redirectToRoute('app_banner_index', [], Response::HTTP_SEE_OTHER);
    }
}
