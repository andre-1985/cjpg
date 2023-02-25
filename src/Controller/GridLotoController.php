<?php

namespace App\Controller;

use App\Form\GridLotoType;
use App\Repository\DrawLotoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Constraints as Assert;

class GridLotoController extends AbstractController
{
    /**
     * @param Request $request
     * @param DrawLotoRepository $repository
     * @return Response
     */
    #[Route('/grilleLoto', name: 'app_grid_loto', methods: ['GET', 'POST'])]
    public function index(Request $request, DrawLotoRepository $repository): Response
    {
        $form = $this->createFormBuilder(null, [
            'constraints' => [
                new Assert\Callback(
                    ['callback' => static function (array $data, ExecutionContextInterface $context) {
                        if (empty($data['gridLoto']['userBallsSelection']) && empty($data['gridLoto']['userLuckyNumberSelection'])) {
                            $context
                                ->buildViolation('Vous devez sélectionner au moins un numéro !')
                                ->addViolation()
                            ;
                        }
                    }]
                )
            ]
        ])
            ->add('gridLoto', GridLotoType::class)
            ->add('validate', SubmitType::class)
            ->getForm()
        ;

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            if (!empty($data['gridLoto']['userBallsSelection']) && !empty($data['gridLoto']['userLuckyNumberSelection']))
            {

//            Création du tableau contenant
//            les boules choisies par l'utilisateur

                $userBalls = $data['gridLoto']['userBallsSelection'];
                $userSelection['userBalls'] = $userBalls;

//            Création du tableau contenant
//            le numéro chance choisie par l'utilisateur

                $userLuckyNumbers = $data['gridLoto']['userLuckyNumberSelection'];
                $userSelection['userLuckyNumbers'] = $userLuckyNumbers;

//            requete de tous les tirages avec au moins une boule
//            ou un numéro chance en commun avec la sélection utilisateur.

                $userSelectionRequest = $repository->findDrawsByUserSelection($userBalls, $userLuckyNumbers);
                foreach ($userSelectionRequest as $userSelectionRq) {
                    $userResultsDrawId = 'draw_' . $userSelectionRq->getId();
                    $ballsRq = $userSelectionRq->getBallsArray();
                    $userCommonBallsArray = array_intersect($userBalls, $ballsRq);
                    if (in_array($userSelectionRq->getLuckyNumber(), $userLuckyNumbers) && count($userCommonBallsArray) >= 1) {
                        $unsortedUserResults[$userResultsDrawId] = [
                            'userCommonBallsArray' => $userCommonBallsArray,
                            'userCommonLuckyNumbers' => $userSelectionRq->getLuckyNumber(),
                            'completeDraw' => $userSelectionRq
                        ];
                    } elseif ($userLuckyNumbers[0] == $userSelectionRq->getLuckyNumber() && count($userCommonBallsArray) == 0) {
                        $userResultsOnlyLuckyNumber[$userResultsDrawId] = [
                            'userCommonLuckyNumbers' => $userSelectionRq->getLuckyNumber(),
                            'completeDraw' => $userSelectionRq
                        ];
                    } else {
                        $unsortedUserResults[$userResultsDrawId] = [
                            'userCommonBallsArray' => $userCommonBallsArray,
                            'completeDraw' => $userSelectionRq
                        ];
                    }
                }
            }
            elseif (!empty($data['gridLoto']['userBallsSelection']) && empty($data['gridLoto']['userLuckyNumberSelection']))
            {

//            Création du tableau contenant
//            les boules choisies par l'utilisateur

                $userBalls = $data['gridLoto']['userBallsSelection'];
                $userSelection['userBalls'] = $userBalls;

//            requete de tous les tirages avec au moins
//            une boule commune avec la sélection utilisateur.

                $userSelectionRequest = $repository->findDrawsByUserBallsSelection($userBalls);

                foreach ($userSelectionRequest as $userSelectionRq) {
                    $userResultsDrawId = 'draw_'.$userSelectionRq->getId();
                    $ballsRq = $userSelectionRq->getBallsArray();
                    $userCommonBallsArray = array_intersect($userBalls, $ballsRq);
                    $unsortedUserResults[$userResultsDrawId] = [
                        'userCommonBallsArray' => $userCommonBallsArray,
                        'completeDraw' => $userSelectionRq
                    ];
                }
            }
            elseif (empty($data['gridLoto']['userBallsSelection']) && !empty($data['gridLoto']['userLuckyNumberSelection']))
            {

//            Création du tableau contenant
//            le numéro chance choisie par l'utilisateur

                $userLuckyNumbers = $data['gridLoto']['userLuckyNumberSelection'];
                $userSelection['userLuckyNumbers'] = $userLuckyNumbers;

//            requete de tous les tirages avec au moins
//            un numéro chance commun avec la sélection utilisateur.

                $userSelectionRequest = $repository->findDrawsByUserLuckyNumbersSelection($userLuckyNumbers);

                foreach ($userSelectionRequest as $userSelectionRq) {
                    $userResultsDrawId = 'draw_'.$userSelectionRq->getId();
                    if (in_array($userSelectionRq->getLuckyNumber(), $userLuckyNumbers)) {
                        $userResultsOnlyLuckyNumber[$userResultsDrawId] = [
                            'userCommonLuckyNumbers' => $userSelectionRq->getLuckyNumber(),
                            'completeDraw' => $userSelectionRq
                        ];
                    }
                }
            }

//            Création du tableau $userResults qui contient tous les tirages
//            gagnants de la sélection utilisateur triés par nombre de
//            numéros gagnants.

            if (isset($unsortedUserResults)) {
                foreach ($unsortedUserResults as $unsortedUserResult) {
                    $countCommonBallsArray = count($unsortedUserResult['userCommonBallsArray']);
                    if ($countCommonBallsArray == 5) {
                        if (isset($unsortedUserResult['userCommonLuckyNumbers'])) {
                            $userResults_5_1_balls['draw_'.$unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                        } else {
                            $userResults_5_balls['draw_'.$unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                        }
                    } elseif ($countCommonBallsArray == 4) {
                        if (isset($unsortedUserResult['userCommonLuckyNumbers'])) {
                            $userResults_4_1_balls['draw_'.$unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                        } else {
                            $userResults_4_balls['draw_'.$unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                        }
                    } elseif ($countCommonBallsArray == 3) {
                        if (isset($unsortedUserResult['userCommonLuckyNumbers'])) {
                            $userResults_3_1_balls['draw_'.$unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                        } else {
                            $userResults_3_balls['draw_'.$unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                        }
                    } elseif ($countCommonBallsArray == 2) {
                        if (isset($unsortedUserResult['userCommonLuckyNumbers'])) {
                            $userResults_2_1_balls['draw_'.$unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                        } else {
                            $userResults_2_balls['draw_'.$unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                        }
                    } elseif ($countCommonBallsArray == 1) {
                        if (isset($unsortedUserResult['userCommonLuckyNumbers'])) {
                            $userResults_1_1_balls['draw_'.$unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                        } else {
                            $userResults_1_balls['draw_'.$unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                        }
                    }
                }

                if (isset($userResults_5_1_balls)) {
                    $userResults['userResults_5_1_balls'] = $userResults_5_1_balls;
                }
                if (isset($userResults_5_balls)) {
                    $userResults['userResults_5_balls'] = $userResults_5_balls;
                }
                if (isset($userResults_4_1_balls)) {
                    $userResults['userResults_4_1_balls'] = $userResults_4_1_balls;
                }
                if (isset($userResults_4_balls)) {
                    $userResults['userResults_4_balls'] = $userResults_4_balls;
                }
                if (isset($userResults_3_1_balls)) {
                    $userResults['userResults_3_1_balls'] = $userResults_3_1_balls;
                }
                if (isset($userResults_3_balls)) {
                    $userResults['userResults_3_balls'] = $userResults_3_balls;
                }
                if (isset($userResults_2_1_balls)) {
                    $userResults['userResults_2_1_balls'] = $userResults_2_1_balls;
                }
                if (isset($userResults_2_balls)) {
                    $userResults['userResults_2_balls'] = $userResults_2_balls;
                }
                if (isset($userResults_1_1_balls)) {
                    $userResults['userResults_1_1_balls'] = $userResults_1_1_balls;
                }
                if (isset($userResults_1_balls)) {
                    $userResults['userResults_1_balls'] = $userResults_1_balls;
                }
            }
            if (isset($userResultsOnlyLuckyNumber)) {
                $userResults['userResultsOnlyLuckyNumber'] = $userResultsOnlyLuckyNumber;
            }

            $userSelectionResults = $userResults;

            return $this->render('pages/grid_loto/result_user_grid_loto.html.twig', [
                'userSelection' => $userSelection,
                'userSelectionResults' => $userSelectionResults,
            ]);
        }

        return $this->render('pages/grid_loto/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
